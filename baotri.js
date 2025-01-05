const ctx = document.getElementById('maintenanceChart').getContext('2d');
const maintenanceChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Máy In', 'Máy Tính', 'Router'],
        datasets: [{
            label: 'Số lượng yêu cầu',
            data: [5, 3, 2],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    }
});

function searchDevice() {
    let filter = document.getElementById('search').value.toUpperCase();
    let ul = document.getElementById('deviceList');
    let li = ul.getElementsByTagName('li');
    for (let i = 0; i < li.length; i++) {
        let txtValue = li[i].textContent || li[i].innerText;
        li[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? "" : "none";
    }
}