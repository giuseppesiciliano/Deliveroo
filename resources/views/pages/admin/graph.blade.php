@extends('layouts.dashboard')

@section('content')
<div class="container">

    <div class="pt-3">
        <a href="{{route('admin.home', ['id' => Auth::user()->id])}}">
            <button class="btn btn-back-2"><i class="fa-solid fa-backward mr-2"></i>Torna all'indice del tuo ristorante</button>
        </a>
    </div>

    <h3 class="text-center dishes-title py-4">Benvenuto nelle tue statistiche</h3>

    {{-- {{ dd($dishes) }} --}}

    <?php
       $data = []; 

       foreach($dishes as $dish) {
           $data[] = $dish->name;
       }

       $encoded = json_encode($data);
    ?>



    <canvas id="myChart" class="card card-shadow p-4 mb-4" width="400" height="200"></canvas>
    <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    
    var encoded = '<?=$encoded?>';
    var data = JSON.parse(encoded);

    let months = ['01/2022', '02/2022', '03/2022', '04/2022', '05/2022', '06/2022', '07/2022', '08/2022', '09/2022', '10/2022', '11/2022', '12/2022',];
    // data.forEach(element => {
    //     myPlates.push(element);
    // });


    let myOrders = [4, 12, 8, 5, 2, 3, 5, 7, 2, 11, 1, 4];

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'n° di ordini',
                data: myOrders,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</div>
@endsection