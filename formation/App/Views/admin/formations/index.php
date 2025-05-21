<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 40px;
        background-color: #f4f6f8;
        color: #333;
    }

    h1 {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    .btn {
        display: inline-block;
        background: linear-gradient(to right, #007bff, #0056b3);
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    th, td {
        padding: 16px 20px;
        text-align: left;
    }

    th {
        background-color: #f0f3f5;
        color: #34495e;
        font-size: 15px;
        font-weight: 600;
    }

    td {
        border-top: 1px solid #e8eaf0;
        font-size: 14px;
    }

    tr:hover {
        background-color: #f9fbfd;
    }

    td a {
        color: #e74c3c;
        text-decoration: none;
        font-weight: 500;
    }

    td a:hover {
        text-decoration: underline;
    }

    @media screen and (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        tr {
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        th, td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        th::before, td::before {
            position: absolute;
            left: 20px;
            width: 45%;
            white-space: nowrap;
            text-align: left;
            font-weight: bold;
        }

        th:nth-of-type(1)::before,
        td:nth-of-type(1)::before { content: "Prix"; }
        th:nth-of-type(2)::before,
        td:nth-of-type(2)::before { content: "Mode"; }
        th:nth-of-type(3)::before,
        td:nth-of-type(3)::before { content: "Cours"; }
        th:nth-of-type(4)::before,
        td:nth-of-type(4)::before { content: "Ville"; }
        th:nth-of-type(5)::before,
        td:nth-of-type(5)::before { content: "Formateur"; }
        th:nth-of-type(6)::before,
        td:nth-of-type(6)::before { content: "Actions"; }
    }
</style>


<h1>Liste des formations</h1>
<a href="/admin/formations/create" class="btn">Ajouter une formation</a>

<table>
    <thead>
    <tr>
        <th>Prix</th>
        <th>Mode</th>
        <th>Cours</th>
        <th>Ville</th>
        <th>Formateur</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($formations as $formation): ?>
        <tr>
            <td><?= $formation['price'] ?> €</td>
            <td><?= ucfirst($formation['mode']) ?></td>
            <td><?= htmlspecialchars($formation['course_name']) ?></td>
            <td><?= htmlspecialchars($formation['city_name']) ?></td>
            <td><?= htmlspecialchars($formation['trainer_name']) ?></td>
            <td>
                <a href="/admin/formations/delete/<?= $formation['id'] ?>" onclick="return confirm('Supprimer ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
