<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petro vs Colombia: ¿Amado u Odiado?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gruppo&family=Staatliches&family=UnifrakturCook:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <style>

        body {
    background-color: rgba(0, 0, 0, 0.6); /* fondo negro con transparencia */
    background-image: url('{{ asset("tormenta2.jpeg") }}');
    background-blend-mode: darken;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: white;
}

        .section-title, h5 {
            color: #e0e0e0;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card {
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    border: none;
}

        .section-title {
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
        .hero-section {
            position: relative;
            width: 100%;
            height: 400px;
            /* background: url('{{ asset('bannerog-1.jpeg') }}') no-repeat center center; */
            background: url('{{ asset('bannerog-1.jpeg') }}') no-repeat center center;
            background-size: contain; /* <-- muestra la imagen completa */
            background-repeat: no-repeat;
            background-color: #000;  /* o un color de respaldo */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); /* fondo oscuro semitransparente */
            z-index: 1;
        }

        .hero-section > * {
            z-index: 2;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* oscurece un poco la imagen para mayor legibilidad */
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
        }

        @keyframes epicTitleEffect {
            0%, 100% {
                transform: perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1);
            }
            25% {
                transform: perspective(1000px) rotateX(5deg) rotateY(-5deg) scale(1.05);
            }
            50% {
                transform: perspective(1000px) rotateX(-5deg) rotateY(5deg) scale(1.1);
            }
            75% {
                transform: perspective(1000px) rotateX(3deg) rotateY(-3deg) scale(1.05);
            }
        }
        .animate-epic {
            display: inline-block;
            animation: epicTitleEffect 3s ease-in-out infinite;
            transform-origin: center;
        }

        .chart-container {
            width: 500px;
            height: 500px;
            margin: 0 auto;
            padding: 0;
        }

        #sentimentChart {
            width: 100% !important;
            height: 100% !important;
        }

        .card.p-4 {
            padding-bottom: 2rem;
            position: relative;
        }

    </style>
</head>
<body>
<div class="position-relative mb-5">
    <img src="{{ asset('bannerog-1.jpeg') }}" class="img-fluid w-100" style="max-height: 500px; object-fit: contain; opacity: 0.5;">

    <div class="position-absolute top-50 start-50 translate-middle text-center text-white w-100">
        <div class="d-flex flex-column align-items-center justify-content-center w-100">
            <h1 class="fw-bold animate-epic mb-3" style="
                font-family: 'Anton', sans-serif;
                font-size: 6rem;
                color: white;
                text-shadow:
                    0 0 6px #000,
                    -6px -6px 0 #000,
                    6px -6px 0 #000,
                    -6px 6px 0 #000,
                    6px 6px 0 #000,
                    -6px -6px 0 #000,
                    6px -6px 0 #000,
                    -6px 6px 0 #000,
                    6px 6px 0 #000;">
                PETRO EN COLOMBIA
            </h1>

            <h2 class="fw-semibold animate-epic" style="font-size: 3.75rem;">
                <span style="
                    color: #32CD32;
                    font-family: 'Baloo 2', cursive;
                    font-weight: 700;
                    -webkit-text-stroke: 1px black;
                    text-stroke: 1px black;">
                    ¿Amado
                </span>
                <span style="
                    color: red;
                    font-family: 'UnifrakturCook', cursive;
                    -webkit-text-stroke: 1px black;
                    text-stroke: 1px black;">
                    u Odiado?
                </span>
            </h2>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row align-items-center">
        <!-- Texto a la izquierda -->
        <div class="col-md-6">
            <h4 class="text-white" style="font-family: 'Poppins', sans-serif; font-weight: 700;">
                Una mirada analítica a la conversación digital en X.com sobre el presidente de Colombia.
            </h4>
            <p>En la era digital, las redes sociales revelan más de lo que aparentan.
                Analizamos los últimos tweets del presidente Petro y las miles de respuestas
                de los ciudadanos para descubrir si es realmente amado… o profundamente cuestionado.</p>

                <img src="{{ asset('Gustavo-Petro-en-cifras-en-X.jpeg') }}" class="img-fluid w-100" style="max-height: 500px; object-fit: contain; opacity: 0.9;">
                <br><br>
            <div class="iframely-embed">
                <div class="iframely-responsive" style="height: 140px; padding-bottom: 0;">
                    <a href="https://x.com/petrogustavo" data-iframely-url="//iframely.net/R8qC922W?_timeline=false"></a>
                </div>
            </div>
            <script async src="//iframely.net/embed.js"></script>
        </div>

        <blockquote class="twitter-tweet" data-dnt="true" align="center">
            <p lang="es" dir="ltr">La espada desenvainada, hoy guía al pueblo hacia la consulta y la justicia social. <a href="https://t.co/JXcoPIJ2Fd">pic.twitter.com/JXcoPIJ2Fd</a></p>&mdash; Gustavo Petro (@petrogustavo) <a href="https://twitter.com/petrogustavo/status/1918057165782176184?ref_src=twsrc%5Etfw">May 1, 2025</a>
        </blockquote>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="section-title fw-bold mb-2">Actividad del Presidente en X.com</div>
                <div class="mb-3 d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Filtro de tiempo">
                        <button type="button" class="btn btn-outline-primary active" data-agrupacion="mensual">Mensual</button>
                        <button type="button" class="btn btn-outline-primary" data-agrupacion="semanal">Semanal</button>
                        <button type="button" class="btn btn-outline-primary" data-agrupacion="anual">Anual</button>
                    </div>
                </div>
                <canvas id="activityChart"></canvas>
                <h5 class="mt-3">A través del tiempo, Petro mantiene una constante actividad en la red.
                    Esta sección permite visualizar su frecuencia de publicación.</h5>
            </div>
        </div>
        <div class="col-md-6">
                <img src="{{ asset('petroconX.avif') }}" class="img-fluid w-100" style="max-height: 500px; object-fit: contain; opacity: 0.9;">
            <br><br>
            <div class="iframely-embed"><div class="iframely-responsive" style="height: 140px; padding-bottom: 0;"><a href="https://x.com/RevistaSemana" data-iframely-url="//iframely.net/9y4z7sm2?_timeline=false"></a></div></div><script async src="//iframely.net/embed.js"></script>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="section-title fw-bold mb-1">Sentimiento de las respuestas</div>
                <div class="chart-container">
                    <canvas id="sentimentChart"></canvas>
                </div>
                <h5 class="mt-2 mb-0">El análisis de sentimiento revela qué tanto amor (o rechazo)
                    hay en las respuestas. ¿Qué dice la voz del pueblo digital?</h5>
            </div>
        </div>
        <div class="col-md-6">
                <img src="{{ asset('petro-jodio-colombia.jpeg') }}" class="img-fluid w-100" style="max-height: 500px; object-fit: contain; opacity: 0.9;">
            <br><br>
            <iframe width="100%" height="265" src="https://www.youtube.com/embed/s2M3UnFWmGo" title="¿Petro es la desgracia de Colombia? | La Pulla" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>

    <!-- Imagen inferior derecha -->
    <img src="{{ asset('petro-diablo-2.png') }}"
        style="position: fixed; bottom: 20px; right: 20px; width: 250px; max-height: 250px; object-fit: contain; opacity: 0.8; z-index: 999;">

    <!-- Imagen inferior izquierda -->
    <img src="{{ asset('petro-angel-2.png') }}"
        style="position: fixed; bottom: 20px; left: 20px; width: 250px; max-height: 250px; object-fit: contain; opacity: 0.8; z-index: 999;">

    <img src="{{ asset('quienes-odian3.png') }}" style="width: 100%; max-height: 500px; object-fit: contain; opacity: 0.9;">
    <br><br>

    <div class="row mb-4">
            <div class="col-6">
                <div class="card p-4">
                    <div class="section-title fw-bold mb-2">¿Existe una diferencia entre cómo hombres y mujeres
                        perciben al presidente? Este gráfico lo explora.</div>
                    <div class="chart-container mb-3" style="margin-bottom: 0;">
                        <canvas id="generoSentimientoChart" width="600" height="400"></canvas>
                        <h5 class="mt-2" style="margin-top: 6px;">No se encuentra un patron con respecto a Hombres, Mujeres o Bodegas.</h5>
                    </div>
                </div>
            </div>
        <div class="col-6">
            <div class="card p-4">
                <div class="section-title fw-bold mb-2">¿O seran que las personas que siempre lo han odiado,
                    son las que fomentan su odio en redes?. Este grafico muestra los usuarios que mas comentan sus post</div>
                <div class="chart-container">
                    <canvas id="usuariosTopChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-3">
            <blockquote class="twitter-tweet" data-dnt="true" align="center">
                <p lang="es" dir="ltr">Jota pe se eligió en las calles y barrios Populares con las banderas de defender el Pueblo Trabajador... <a href="https://t.co/w53JQyqRbd">pic.twitter.com/w53JQyqRbd</a></p>&mdash; 𝗪𝗜𝗟𝗦𝗢𝗡 𝗦𝗨𝗔𝗭𝗔 (@Wilson_Suaza_) <a href="https://twitter.com/Wilson_Suaza_/status/1922453099605598402?ref_src=twsrc%5Etfw">May 14, 2025</a>
            </blockquote>
        </div>
        <div class="col-3">
            <blockquote class="twitter-tweet" data-dnt="true" align="center">
                <p lang="es" dir="ltr">🇨🇴🚨Petro es mal perdedor. Fue derrotado en el congreso y ahora quiere imponer su dictadura... <a href="https://t.co/JSd3rQPy9l">pic.twitter.com/JSd3rQPy9l</a></p>&mdash; Jhonf Fonseca (@Jhonffonseca) <a href="https://twitter.com/Jhonffonseca/status/1930370416461394044?ref_src=twsrc%5Etfw">June 4, 2025</a>
            </blockquote>
        </div>
        <div class="col-3">
            <blockquote class="twitter-tweet" data-dnt="true" align="center">
                <p lang="es" dir="ltr">🇨🇴 PETRO dice: &quot; Yo lucho por el PUEBLO!!&quot; ❌ Olmedo López - Cárcel por corrupción... <a href="https://t.co/rUkhwoxmAg">pic.twitter.com/rUkhwoxmAg</a></p>&mdash; Misión cumplida (@ojocolombia2026) <a href="https://twitter.com/ojocolombia2026/status/1930319199844315317?ref_src=twsrc%5Etfw">June 4, 2025</a>
            </blockquote>
        </div>
        <div class="col-3">
            <blockquote class="twitter-tweet" data-dnt="true" align="center" data-conversation="none">
                <p lang="es" dir="ltr">Lo que muchos se negaban a aceptarlo, hoy es toda una realidad... <a href="https://t.co/XwvCgQrBpV">pic.twitter.com/XwvCgQrBpV</a></p>&mdash; Papo Amin | Concejal de Bogotá (@papoaminCD) <a href="https://twitter.com/papoaminCD/status/1930071698050547786?ref_src=twsrc%5Etfw">June 4, 2025</a>
            </blockquote>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-3">
            <img src="{{ asset('Rincon001A.png') }}" class="img-fluid w-100">
        </div>
        <div class="col-3">
            <img src="{{ asset('JuampaSantos.png') }}" class="img-fluid w-100">
        </div>
        <div class="col-3">
            <blockquote class="twitter-tweet" data-dnt="true" align="center">
                <p lang="es" dir="ltr">Estos son los petristas👇 <a href="https://t.co/WFpmEsCuyI">pic.twitter.com/WFpmEsCuyI</a></p>&mdash; Mónica Saade (@MonicaSaadeX) <a href="https://twitter.com/MonicaSaadeX/status/1930269010295189973?ref_src=twsrc%5Etfw">June 4, 2025</a>
            </blockquote>
        </div>
        <div class="col-3">
            <blockquote class="twitter-tweet" data-dnt="true" align="center" data-conversation="none">
                <p lang="es" dir="ltr">Mentira y basura el proyecto subterráneo que no paso de un Dumie... <a href="https://t.co/og4bvdipt0">pic.twitter.com/og4bvdipt0</a></p>&mdash; Roberto Salazar (@Manoloparis_) <a href="https://twitter.com/Manoloparis_/status/1930269425522884924?ref_src=twsrc%5Etfw">June 4, 2025</a>
            </blockquote>
        </div>
    </div>

    <div class="row mb-4">
            <div class="col-6">
                <div class="card p-4">
                    <div class="section-title fw-bold mb-2">¿Cuales serian las palabras que mas le comentan al Presidente Gustavo Petro?</div>
                    <br><br>
                    <div class="chart-container mb-3" style="margin-bottom: 0;">
                        <img src="{{ asset('palabras-mas-dichas2.jpg') }}" class="img-fluid w-100">
                        <br><br>
                        <h5 class="mt-2" style="margin-top: 6px;">Guerrillero, Terrorista.... No parecen palabras con las que deberian referirse al Presidente...</h5>
                    </div>

                </div>
            </div>
        <div class="col-md-6">
            <div class="card p-4">
                <div class="section-title fw-bold mb-2">Evolución del Sentimiento en X.com</div>
                <div class="mb-3 d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Filtro de tiempo">
                        <button type="button" class="btn btn-outline-primary active" data-agrupacion="mensual">Mensual</button>
                        <button type="button" class="btn btn-outline-primary" data-agrupacion="semanal">Semanal</button>
                        <button type="button" class="btn btn-outline-primary" data-agrupacion="anual">Anual</button>
                    </div>
                </div>
                <canvas id="sentimientoChart"></canvas>
                <h5 class="mt-3">
                    Este gráfico refleja cómo varió el promedio del sentimiento en los comentarios hacia el presidente a través del tiempo.
                </h5>
            </div>
        </div>
    </div>

    <div class="section-title fw-bold mb-2">
        ¿Sera todo el sentimiento negativo hacia el presidente Gustavo Petro, una estrategia de la oposición?
    </div>
    <div class="section-title fw-bold mb-2">
        ¿Todo el sentimiento negativo de los comentarios, sera dirigido hacia el Presidente?
    </div>
    <br>
    <img src="{{ asset('petro-malas-graficas-alargado.png') }}" style="width: 100%; max-height: 500px; object-fit: contain; opacity: 0.9;">
    <br><br>
</div>
</body>

<script>
    const chartCanvas = document.getElementById('activityChart');
    let chart;

    function cargarGrafico(agrupacion = 'mensual') {
        fetch(`/tweets-actividad?agrupacion=${agrupacion}`)
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.periodo);
                const counts = data.map(item => item.total);

                if (chart) {
                    chart.destroy();
                }

                chart = new Chart(chartCanvas.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Tweets por ' + agrupacion,
                            data: counts,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.3,
                            fill: true,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)'
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: `Actividad del Presidente Petro (${agrupacion})`
                            }
                        },
                        interaction: {
                            mode: 'nearest',
                            axis: 'x',
                            intersect: false
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: agrupacion === 'anual' ? 'Año' : (agrupacion === 'semanal' ? 'Semana' : 'Mes')
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Cantidad de Tweets'
                                }
                            }
                        }
                    }
                });
            });
    }

    // Lógica de selección de botones
    const botones = document.querySelectorAll('[data-agrupacion]');
    botones.forEach(boton => {
        boton.addEventListener('click', function () {
            botones.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const agrupacion = this.getAttribute('data-agrupacion');
            cargarGrafico(agrupacion);
        });
    });

    // Cargar gráfico inicial
    cargarGrafico();

    fetch('/sentimiento-respuestas')
    .then(response => response.json())
    .then(data => {
        const labels = data.map(item => item.sentiment);
        const counts = data.map(item => item.total);
        const total = counts.reduce((a, b) => a + b, 0);

        const ctx = document.getElementById('sentimentChart').getContext('2d');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: counts,
                    backgroundColor: [
                        '#d73027', // Muy negativo - rojo
                        '#fc8d59', // Negativo - naranja
                        '#d9d9d9', // Neutro - gris
                        '#91bfdb', // Positivo - azul claro
                        '#4575b4'  // Muy positivo - azul oscuro
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: { font: { size: 14 } }
                    },
                    datalabels: {
                        color: 'white',
                        formatter: (value) => {
                            let percent = (value / total * 100).toFixed(1);
                            return percent + '%';
                        },
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        textStrokeColor: 'black',
                        textStrokeWidth: 1,
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.parsed || 0;
                                return label + ': ' + value + ' respuestas';
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    });

    fetch('/sentimiento-por-genero')
    .then(response => response.json())
    .then(data => {
        // Sentimientos únicos (ej: Positivo, Neutro, etc.)
        const sentimientos = [...new Set(data.map(item => item.sentiment))];

        // Dataset por género
        const generos = [
            { key: 'male', label: 'Hombre', color: 'rgba(54, 162, 235, 0.7)' },
            { key: 'female', label: 'Mujer', color: 'rgba(255, 99, 132, 0.7)' },
            { key: 'bodega', label: 'Bodega', color: 'rgba(255, 206, 86, 0.7)' }
        ];
        const colores = {
            male: 'rgba(54, 162, 235, 0.7)',
            female: 'rgba(255, 99, 132, 0.7)',
            bodega: 'rgba(255, 206, 86, 0.7)'
        };

        const datasets = generos.map(genero => ({
            label: genero.label,
            backgroundColor: genero.color,
            data: sentimientos.map(sent => {
                const item = data.find(d => d.sentiment === sent && d.gender === genero.key);
                return item ? item.estimado : 0;
            })
        }));

        new Chart(document.getElementById('generoSentimientoChart'), {
            type: 'bar',
            data: {
                labels: sentimientos,
                datasets: datasets
            },
            options: {
                layout: {
                    padding: {
                        bottom: 0,
                        top: 0
                    }
                },
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Distribución estimada de sentimientos por género'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    },
                    legend: {
                        position: 'top'
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                },
                scales: {
                    x: {
                        stacked: true
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad estimada de respuestas'
                        }
                    }
                }
            }
        });
    });

    fetch('/usuarios-mas-comentan')
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.comment_username);
            const counts = data.map(item => item.total);

            new Chart(document.getElementById('usuariosTopChart'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Número de Comentarios',
                        data: counts,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)'
                    }]
                },
                options: {
                    responsive: true,
                    indexAxis: 'y',
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            ticks: {
                                autoSkip: false,
                                font: {
                                    size: 12
                                }
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Top 20 usuarios que más comentan a Petro'
                        },
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });

    const canvasSentimiento = document.getElementById('sentimientoChart');
    let sentimientoChart;

    function cargarGraficoSentimiento(agrupacion = 'mensual') {
        fetch(`/sentimiento-tiempo?agrupacion=${agrupacion}`)
            .then(response => response.json())
            .then(data => {
                const labels = data.map(item => item.periodo);
                const values = data.map(item => item.promedio);

                if (sentimientoChart) {
                    sentimientoChart.destroy();
                }

                sentimientoChart = new Chart(canvasSentimiento.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Score promedio',
                            data: values,
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            tension: 0.3,
                            fill: true,
                            pointRadius: 3,
                            pointBackgroundColor: 'white'
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: `Score promedio de sentimiento (${agrupacion})`,
                                color: 'white'
                            },
                            legend: {
                                labels: {
                                    color: 'white'
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: { color: 'white' },
                                title: {
                                    display: true,
                                    text: agrupacion === 'anual' ? 'Año' : (agrupacion === 'semanal' ? 'Semana' : 'Mes'),
                                    color: 'white'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: { color: 'white' },
                                title: {
                                    display: true,
                                    text: 'Sentiment Score Promedio',
                                    color: 'white'
                                }
                            }
                        }
                    }
                });
            });
    }

    // Botones para cambiar agrupación
    const botonesSentimiento = document.querySelectorAll('[data-agrupacion]');
    botonesSentimiento.forEach(boton => {
        boton.addEventListener('click', function () {
            botonesSentimiento.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const agrupacion = this.getAttribute('data-agrupacion');
            cargarGraficoSentimiento(agrupacion);
        });
    });

    // Carga inicial
    cargarGraficoSentimiento();

</script>


</body>
</html>
