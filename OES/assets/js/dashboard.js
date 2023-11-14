document.addEventListener("DOMContentLoaded", function () {
  var last_time_updated = document.querySelector(".time-frame");
  const enrollees_cont = document.getElementById("enrollees-chart");
  const enrollees_by_gender_cont = document.getElementById(
    "enrollees-gender-chart"
  );
  const enrollees_by_grdlvl_cont = document.getElementById(
    "enrollees-grade-level-chart"
  );

  let enrollees_chart = new ChartJS(enrollees_cont, {
    type: "bar",
    options: { responsive: true, plugins: { legend: { position: "bottom" } } },
  });
  let enrollees_by_gender_chart = new ChartJS(enrollees_by_gender_cont, {
    type: "pie",
    options: { responsive: true, plugins: { legend: { position: "bottom" }, tooltip : { callbacks : { label : transformText } } } },
  });
  let enrollees_by_grdlvl_chart = new ChartJS(enrollees_by_grdlvl_cont, {
    type: "pie",
    options: { responsive: true, plugins: { legend: { position: "bottom" }, tooltip : { callbacks : { label : transformText } } } },
  });
//   console.log($("header a.nav-link"));
  $("header a.nav-link").each(function (i) {
    $(this).removeClass("active");
  });
  $("a#dashboard").addClass("active");

  // chart.addDataset({
  //     label: 'GAS',
  //     data: [
  //         {x : "JANUARY", y : 100},
  //         {x : "FEBRUARY", y : 100},
  //     ],
  //     borderWidth: 1
  //   });

  //   DELAY(()=>chart.addData({x : "JANUARY", y : 500}));
  //   DELAY(()=>chart.addData({x : "MARCH", y : 200}), 5000);

  //   setInterval(() => {
  //     updateChart();
  //   }, 1000);

  //   function updateChart() {
  //     const index = parseInt(Math.abs(Math.random() * MONTHS.length - 1));

  //     const month = MONTHS[index].toUpperCase();
  //     const val = parseInt(Math.abs(Math.random() * 1000));

  //     DELAY(()=>chart.addData({x : month, y : val}));

  //     chart.sort();
  //   }
  setInterval(() => {
    fetch_dashboard_data(
      base_url + "/api/number_of_enrollees.php",
      enrollees_by_gender_chart,
      "gender"
    );
  }, 1000);

  setInterval(() => {
    fetch_dashboard_data(
      base_url + "/api/number_of_enrollees.php",
      enrollees_by_grdlvl_chart,
      "grade_level",
      ""
    );
  }, 1000);
  fetch_dashboard_data(
    base_url + "/api/number_of_enrollees.php",
    enrollees_chart,
    "all",
    "gradelevel"
  );

  setInterval(() => {
    fetch_last_enrollee(
      base_url + "/api/last_data_inserted.php",
      document.querySelector(".time-frame")
    );
  }, 1000);

  setInterval(() => {
    fetch_total_enrollee(
      base_url + "/api/number_of_enrollees.php",
      document.querySelector("#total-enrollees")
    );
  }, 1000);

  // fetch_last_enrollee(base_url + "/api/last_data_inserted.php?grdlvl='12'", document.querySelector(`#${grd_12_cont.id} + p`));

  // console.log(window.PopStateEvent);

  function transformText(context) {
    let formattedValue = context.formattedValue || "";
    console.log(context);
    if (formattedValue) {
      formattedValue += "%";
    }
    return formattedValue;
  }

  function fetch_dashboard_data(url = null, chart = null, by = "", x = "") {
    if (!url || !chart) return;
    const data = new FormData();
    data.append("by", by);
    fetch(url, {
      method: "post",
      body: data,
    })
      .then((resp) => resp.json())
      .then((data) => {
        chart.add_data(data.data, x);
      })
      .catch((err) => {
        console.log(err);
      });
  }

  function fetch_last_enrollee(url = null, element = null) {
    if (!url) return;
    fetch(url)
      .then((resp) => resp.json())
      .then((data) => {
        const date = new Date(data.data.created_at);
        const __date = {};
        __date.month = month_mapper(date.getMonth());
        __date.date = date.getDate();
        __date.year = date.getFullYear();
        __date.hour =
          date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        __date.minutes = date.getMinutes();
        __date.time_convention = date.getHours() < 12 ? "AM" : "PM";

        const text = `Enrollees as of ${__date.hour}:${__date.minutes} ${__date.time_convention} ${__date.month} ${__date.date}, ${__date.year}`;
        if (text != last_time_updated.innerText) element.innerText = text;
      })
      .catch((err) => {
        console.log(err);
      });
  }

  function fetch_total_enrollee(url = null, element = null) {
    if (!url) return;
    const form = new FormData();
    form.append("by", "total");
    fetch(url, {
      method: "post",
      body: form,
    })
      .then((response) => response.json())
      .then((data) => {
        const total = data.data[0]["total"];
        element.innerText = total;
      })
      .catch((error) => console.log(error));
  }

  function month_mapper(month) {
    const MONTHS = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];
    return MONTHS[month];
  }
});

class ChartJS extends Chart {
  constructor(ctx, prop) {
    super(ctx, prop);
  }

  add_data(data, x = "") {
    if (this.config.type == "bar") {
      const chart_labels = this.data.datasets.map((d) => d.label);
      for (let d of data) {
        if (!chart_labels.includes(d[x])) chart_labels.push(d[x]);

        const pos = chart_labels.indexOf(d[x]);
        if (!this.data.datasets[pos])
          this.data.datasets[pos] = {
            data: [d],
            label: d[x],
            backgroundColor: pos == 0 ? "#c08080" : "#993333",
          };
        else this.data.datasets[pos].data.push({ x: d["x"], y: d["y"] });
      }
      console.log(this.data);
      this.update();
    } else if (this.config.type == "pie") {
      const external_data_labels = new Set();

      for (let d of data) {
        external_data_labels.add(d["x"]);
      }
      // console.log();

      // delete the label and the dataset in the chart object if it is not exist in external data
      this.data.labels.forEach((val, index) => {
        if (!external_data_labels.has(val)) {
          delete this.data.labels[index];
          delete this.data.datasets[index];
        }
      });
      // console.log(this.data.labels);
      // remove the `empty` data in labels
      this.data.labels = this.data.labels.filter((d) => !d);

      for (let d of data) {
        if (!this.data.labels.includes(d["x"])) {
          if (d["x"] === "GRADE 11" || d["x"] === "Female")
            this.data.labels[1] = d["x"];
          else if (d["x"] === "GRADE 12" || d["x"] === "Male")
            this.data.labels[0] = d["x"];
        }

        const pos = this.data.labels.indexOf(d["x"]);

        if (this.data.datasets.length < 1)
          this.data.datasets[0] = {
            data: [],
            backgroundColor: ["#c08080", "#993333"],
          };
        this.data.datasets[0].data[pos] = d["y"];

        // console.log(this.config.type, this.data.datasets[0].data, this.data.datasets[0].data.length)
      }
      this.update();
    }
  }

  // addDataset(datasets) {
  //     if(!datasets) return null;
  //     if(datasets) this.data.datasets.push(datasets);
  // }

  // addData(nData) {

  //     this.data.datasets.forEach((val)=>{
  //         let pos = null;

  //         val.data.forEach(function(d, index){
  //             if(nData["x"] === d["x"]) pos = index;
  //         })

  //         if(typeof pos == "number") {
  //             this.data.datasets[0].data[pos] = nData;
  //         } else {
  //             this.data.datasets[0].data.push(nData);
  //         }
  //         this.update();
  //     })
  // }

  // sort() {
  //     this.data.datasets[0].data.sort((a,b)=>a["x"].localeCompare(b["x"]));
  //     this.update();
  // }
}

function DELAY(callback, sec = 1500) {
  if (!callback) return;
  setTimeout(callback, sec);
}
