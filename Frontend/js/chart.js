'use strict';

const SITES = ['ulb', 'vub', 'beguinage'];
window.onload = () => {
    globalViewChart();
    for (let site of SITES) {
        siteChart(site);
        console.log(site);
    }
};

// Functions
let globalViewChart = () => {
    const globalChartDOM = document.getElementById('globalChart');
    const globalChart = new Chart(globalChartDOM, {
        data: {
            options: {
                responsive: false
            },
            datasets: [{
                type: 'line',
                label: 'Bar Dataset',
                data: [10, 20, 30, 40],
                backgroundColor: 'red'
            }, {
                type: 'line',
                label: 'Line Dataset',
                data: [50, 50, 50, 50],
                backgroundColor: 'blue'
            }],
            labels: ['January', 'February', 'March', 'April']
        },
    })
};

let siteChart = (site) => {
    const DATA = {
        labels: [
            'Red',
            'blue',
            'yellow'
        ],
        datasets: [{
            label: 'Title',
            data: [70,34,21],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
              ],
              hoverOffset: 4
        }]
    };

    const CONFIG = {
        type: 'doughnut',
        data: DATA
    };


    const CHARTDOM = document.getElementById(`${site}Chart`);
    let chart = new Chart(CHARTDOM, CONFIG);
}