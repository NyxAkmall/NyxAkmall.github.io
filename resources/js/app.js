import './bootstrap'

import '../scss/app.scss'

import Chart from 'chart.js/auto'

import { initShellBehaviors } from './adminator/init'

initShellBehaviors()

const sampahChart = document.getElementById('sampahChart')

if (sampahChart) {
    const organik = Number(sampahChart.dataset.organik || 0)
    const anorganik = Number(sampahChart.dataset.anorganik || 0)

    new Chart(sampahChart, {
        type: 'doughnut',

        data: {
            labels: [
                'Organik',
                'Anorganik'
            ],

            datasets: [
                {
                    label: 'Total Sampah',
                    data: [
                        organik,
                        anorganik
                    ],
                    borderWidth: 0
                }
            ]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    })
}

const trenHarianChart = document.getElementById('trenHarianChart')

if (trenHarianChart) {
    const labels = JSON.parse(trenHarianChart.dataset.labels || '[]')
    const values = JSON.parse(trenHarianChart.dataset.values || '[]')

    new Chart(trenHarianChart, {
        type: 'line',

        data: {
            labels: labels,

            datasets: [
                {
                    label: 'Volume Sampah',
                    data: values,
                    tension: 0.4,
                    fill: true,
                    borderWidth: 3
                }
            ]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    position: 'bottom'
                }
            },

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    })
}
