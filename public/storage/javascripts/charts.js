const bgColor = [
    'rgba(255, 99,  132)',
    'rgba(54,  162, 235)',
    'rgba(255, 206, 86)',
    'rgba(75,  192, 192)',
    'rgba(153, 102, 255)',
    'rgba(255, 159, 64)'
]

const bColor = [
    'rgba(255, 99,  132)',
    'rgba(54,  162, 235)',
    'rgba(255, 206, 86)',
    'rgba(75,  192, 192)',
    'rgba(153, 102, 255)',
    'rgba(255, 159, 64)'
]

const pie_json = {
    responsive: true,
    maintainAspectRatio: false,
    layout: {
        padding: {
            bottom: 20 // Set the bottom margin value
        }
    },
    scales: {
      x: {
        display: false, // Remove the x-axis line and labels
      },
      y: {
        display: false, // Remove the y-axis line and labels
        beginAtZero: true,
      },
    },
  }

// Use the variables in your Chart.js configuration
const chart_gender = document.getElementById('gender')
new Chart(chart_gender, {
    type: 'pie',
    data: {
        labels: ['MALE', 'FEMALE', 'LESBIAN', 'GAY', 'OTHERS'],
        datasets: [{
            data: [male, female, lesbian, gay, otherGender],
            backgroundColor: bgColor,
            borderColor: bColor,
            borderWidth: 1
        }],
    },
    options: pie_json
})

const chart_age = document.getElementById('ages')
new Chart(chart_age, {
    type: 'pie',
    data: {
        labels: ['<=14', '15-17', '15-30', '18-59', '>=60'],
        datasets: [{
            data: [child.length, teen.length, youngAdult.length, adult.length, senior.length],
            backgroundColor: bgColor,
            borderColor: bColor,
            borderWidth: 1.2
        }]
    },
    options: pie_json
});

const chart_ss = document.getElementById('social_sector')
new Chart(chart_ss, {
    type: 'pie',
    data: {
        labels: ['NA', 'EDUCATION', 'HEALTH', 'SOCIAL WELFARE', 'SPORTS'],
        datasets: [{
            data: [NA, education, health, social, sports],
            backgroundColor: bgColor,
            borderColor: bColor,
            borderWidth: 1.5
        }]
    },
    options: pie_json
})

const chart_status = document.getElementById('civil_status')
new Chart(chart_status, {
    type: 'pie',
    data: {
        labels: ['SINGLE', 'MARRIED', 'WIDOWED', 'LIVE-IN', 'SEPARATED', 'DIVORCED'],
        datasets: [{
            data: [single, married, widowed, livein, separated, divorced],
            backgroundColor: bgColor,
            borderColor: bColor,
            borderWidth: 1
        }]
    },
    options: pie_json
});


const chart_cards = document.getElementById('cards')
new Chart(chart_cards, {
    type: 'bar',
    data: {
        labels: ['Yellow Card', 'Blue Card', 'White Card', 'Makatizen Card', 'Philhealth'],
        datasets: [{
            label: "",
            data: [yellow, blue, white, makatizen, philhealth],
            backgroundColor: bgColor,
            borderColor: bColor,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        skipNull: true,
        scales: {
            y: {
                beginAtZero: true,
            }
        }
    }
})

const chart_vaccine = document.getElementById('vaccinated')
new Chart(chart_vaccine, {
    type: 'bar',
    data: {
        labels: [''],
        datasets: [
            {
                label: 'FULLY VACCINATED',
                data: [vaccinated],
                backgroundColor: bgColor[0],
                borderColor: bColor[0],
                borderWidth: 1
            },
            {
                label: 'SINGLE DOSE',
                data: [singleDose],
                backgroundColor: bgColor[1],
                borderColor: bColor[1],
                borderWidth: 1
            },
            {
                label: 'VACCINE EXEMPT',
                data: [vaccineExempt],
                backgroundColor: bgColor[2],
                borderColor: bColor[2],
                borderWidth: 1
            },
            {
                label: 'UNVACCINATED',
                data: [unvaccinated],
                backgroundColor: bgColor[3],
                borderColor: bColor[3],
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
          }
        }
      }
})


const chart_religion = document.getElementById('religion')
new Chart(chart_religion, {
    type: 'bar',
    data: {
      labels: [''],
      datasets: [
        {
            label: 'Roman Catholic',
            data: [catholic],
            backgroundColor: bgColor[0],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },
        {
            label: 'Iglesia Ni Cristo',
            data: [iglesia],
            backgroundColor: bgColor[1],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },
        {
            label: 'Muslim',
            data: [muslim],
            backgroundColor: bgColor[2],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },
        {
            label: 'Born Again',
            data: [bornAgain],
            backgroundColor: bgColor[3],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },
        {
            label: 'Seventh Day Adventist',
            data: [adventist],
            backgroundColor: bgColor[4],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },
        {
            label: 'Saksi Ni Jehovah',
            data: [jehovah],
            backgroundColor: bgColor[5],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },
        {
            label: 'Mormons',
            data: [mormons],
            backgroundColor: bgColor[0],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },
        {
            label: 'Buddhist',
            data: [buddhist],
            backgroundColor: bgColor[1],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },
        {
            label: 'Other Religions',
            data: [otherReligion],
            backgroundColor: bgColor[2],
            borderWidth: 1,
            borderColor: '#fff',
            hoverOffset: 4
        },

    ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: true,
          position: 'right'
        }
      }
    }
  });
  
