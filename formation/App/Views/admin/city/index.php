<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function confirmDelete(event) {
            if (!confirm("Are you sure you want to delete this city?")) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto p-6">

    <!-- Filter form -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="/admin/city" method="GET" class="flex space-x-6 flex-wrap">
            <div class="flex items-center space-x-2">
                <label for="filter_id" class="text-lg">Filter by ID:</label>
                <input type="text" id="filter_id" name="filter_id"
                       value="<?= htmlspecialchars($_GET['filter_id'] ?? '') ?>"
                       placeholder="City ID"
                       class="border border-gray-300 rounded-lg px-4 py-2 w-40 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center space-x-2">
                <label for="filter_name" class="text-lg">Filter by Name:</label>
                <input type="text" id="filter_name" name="filter_name"
                       value="<?= htmlspecialchars($_GET['filter_name'] ?? '') ?>"
                       placeholder="City name"
                       class="border border-gray-300 rounded-lg px-4 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                Apply
            </button>
        </form>
    </div>

    <h1 class="text-3xl font-bold text-center mb-6">City List</h1>

    <div class="text-right mb-4">
        <a href="/admin/city/create"
           class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
            + Add a City
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">City Name</th>
                <th class="py-2 px-4 text-left">Country ID</th>
                <th class="py-2 px-4 text-left">Country Name</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($cities)): ?>
                <?php foreach ($cities as $city): ?>
                    <?php if (isset($_GET['edit_id']) && $_GET['edit_id'] == $city['id']): ?>
                        <!-- Inline edit row -->
                        <tr class="border-t bg-yellow-50">
                            <form action="/admin/city/update/<?= $city['id'] ?>" method="POST">
                                <td class="py-2 px-4"><?= $city['id'] ?></td>
                                <td class="py-2 px-4">
                                    <input type="text" name="name" value="<?= htmlspecialchars($city['name']) ?>"
                                           class="border rounded px-2 py-1 w-full">
                                </td>
                                <td class="py-2 px-4"><?= htmlspecialchars($city['country_id']) ?></td>
                                <td class="py-2 px-4"><?= htmlspecialchars($city['country_name']) ?></td>
                                <td class="py-2 px-4">
                                    <button type="submit" class="text-green-600 hover:text-green-800">✔ Save</button>
                                    <a href="/admin/city" class="text-gray-500 ml-4 hover:underline">Cancel</a>
                                </td>
                            </form>
                        </tr>
                    <?php else: ?>
                        <!-- Normal row -->
                        <tr class="border-t">
                            <td class="py-2 px-4"><?= $city['id'] ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($city['name']) ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($city['country_id']) ?></td>
                            <td class="py-2 px-4"><?= htmlspecialchars($city['country_name']) ?></td>
                            <td class="py-2 px-4">
                                <a href="/admin/city?edit_id=<?= $city['id'] ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                                <a href="/admin/city/delete/<?= $city['id'] ?>" onclick="return confirmDelete(event)" class="text-red-500 hover:text-red-700 ml-4">Delete</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center py-4">No cities found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
