<?php $title = "Tableau de bord"; ?>

<div class="mb-8">
    <h1 class="text-4xl font-extrabold text-gray-900">Bienvenue sur le tableau de bord</h1>
    <p class="text-gray-600 mt-3 max-w-xl">Gérez vos entités de formation depuis ce panneau d'administration.</p>
</div>

<!-- Cartes statistiques colorées -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php
    // Couleurs pastel et icônes SVG simples associées
    $cards = [
        'Pays' => ['color' => 'bg-indigo-100 text-indigo-700', 'icon' => '🌍', 'url' => '/admin/country', 'desc' => 'Ajouter, modifier ou supprimer les pays disponibles.'],
        'Villes' => ['color' => 'bg-rose-100 text-rose-700', 'icon' => '🏙️', 'url' => '/admin/city', 'desc' => 'Gérez les villes par pays.'],
        'Formateurs' => ['color' => 'bg-green-100 text-green-700', 'icon' => '👨‍🏫', 'url' => '/admin/trainers', 'desc' => 'Ajouter et modifier les formateurs disponibles.'],
        'Sujets' => ['color' => 'bg-yellow-100 text-yellow-700', 'icon' => '📖', 'url' => '/admin/subjects', 'desc' => 'Ajouter des sujets liés aux domaines.'],
        'Formations' => ['color' => 'bg-purple-100 text-purple-700', 'icon' => '📆', 'url' => '/admin/formations', 'desc' => 'Planifiez et gérez les formations.'],
    ];

    foreach ($cards as $name => $info) :
        $count = $entityCounts[$name] ?? 0;
        ?>
        <div class="rounded-lg shadow-lg p-6 flex items-center <?= $info['color'] ?> transition transform hover:scale-105">
            <div class="text-5xl mr-5"><?= $info['icon'] ?></div>
            <div>
                <h2 class="text-2xl font-semibold"><?= $name ?></h2>
                <p class="text-sm mb-2"><?= $info['desc'] ?></p>
                <div class="font-bold text-xl"><?= $count ?></div>
                <a href="<?= $info['url'] ?>" class="mt-2 inline-block text-indigo-600 font-medium hover:underline">Gérer</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Graphiques -->
<div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-10">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-5">Répartition des entités</h3>
        <canvas id="pieChart"></canvas>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-5">Nombre d'entités</h3>
        <canvas id="barChart"></canvas>
    </div>
</div>

<script>
    const dataFromPHP = <?= json_encode($entityCounts) ?>;

    // Palette pastel
    const colors = [
        '#6366F1', // indigo-500
        '#F87171', // red-400
        '#34D399', // green-400
        '#FBBF24', // yellow-400
        '#A78BFA'  // purple-400
    ];

    // Pie Chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(dataFromPHP),
            datasets: [{
                data: Object.values(dataFromPHP),
                backgroundColor: colors,
                borderWidth: 2,
                borderColor: '#fff',
                hoverOffset: 30
            }]
        },
        options: {
            responsive: true,
            cutout: '60%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#374151', // gray-700
                        font: { weight: 'bold', size: 14 }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: ctx => `${ctx.label}: ${ctx.parsed} entités`
                    }
                }
            }
        }
    });

    // Bar Chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: Object.keys(dataFromPHP),
            datasets: [{
                label: 'Nombre d\'entités',
                data: Object.values(dataFromPHP),
                backgroundColor: colors,
                borderRadius: 6,
                maxBarThickness: 45
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#374151', font: { size: 14 } },
                    grid: { color: '#E5E7EB' }
                },
                x: {
                    ticks: { color: '#374151', font: { size: 14 } },
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: ctx => `${ctx.parsed.y} entités`
                    }
                }
            }
        }
    });
</script>
