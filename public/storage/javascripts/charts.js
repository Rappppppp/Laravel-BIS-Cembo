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
        }]
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
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
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
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


const chart_religion = document.getElementById('religion')
new Chart(chart_religion, {
    type: 'bar',
    data: {
        labels: ['ROMAN CATHOLIC', 'IGLESIA NI CRISTO', 'MUSLIM', 'BORN AGAIN', 'SEVENTH DAY ADVENTIST', 'SAKSI NI JEHOVAH', 'MORMONS', 'BUDDHIST', 'OTHERS'],
        datasets: [{
            data: [catholic, iglesia, muslim, bornAgain, adventist, jehovah, mormons, buddhist, otherReligion],
            backgroundColor: bgColor,
            borderColor: bColor,
            borderWidth: 1
        }]
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
        labels: ['FULLY VACCINATED', 'SINGLE DOSE', 'VACCINE EXEMPT', 'UNVACCINATED'],
        datasets: [{
            data: [vaccinated, singleDose, vaccineExempt, unvaccinated],
            backgroundColor: bgColor,
            borderColor: bColor,
            borderWidth: 1
        }]
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
