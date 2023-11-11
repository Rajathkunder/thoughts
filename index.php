<?php
$myFile = "data.json";
$jsondata = file_get_contents($myFile);
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
    <style type="text/css">

        .max-w-md {
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }
        @media (max-width: 640px) {
            .sticky-button {
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 9999;
            }
        }
    </style>
</head>

<body class="bg-gray-200">
    <nav class="bg-gray-800 p-4 flex flex-col md:flex-row justify-between items-center text-white">
        <div class="text-2xl font-bold mb-4 md:mb-0 md:mb-0">Ripples</div>

        <div class="flex items-center">
            <input class="border border-gray-400 p-2 rounded-l focus:outline-none" type="text" placeholder="Search...">
            <button class="bg-gray-600 text-white p-2 rounded-r">Search</button>
        </div>
    </nav>
    <div id="dataContainer" class="flex items-center justify-center flex-wrap"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dataContainer = document.getElementById('dataContainer');
            const xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const data = JSON.parse(xhr.responseText);
                    data.forEach(item => {
                        const card = document.createElement('div');
                        card.className = 'max-w-md w-full rounded overflow-hidden shadow-lg bg-white mt-4 p-4';

                        const profileSection = document.createElement('div');
                        profileSection.className = 'flex items-center';
                        const profileImage = document.createElement('img');
                        profileImage.className = 'rounded-avatar';
                        profileImage.src = 'profile.webp';
                        profileImage.alt = 'Profile Image';
                        const thoughtsTitle = document.createElement('div');
                        thoughtsTitle.className = 'ml-4';
                        thoughtsTitle.innerHTML = '<p class="text-lg font-bold">Thoughts</p>';

                        profileSection.appendChild(profileImage);
                        profileSection.appendChild(thoughtsTitle);

                        const thoughtContent = document.createElement('div');
                        thoughtContent.className = 'mt-4';
                        thoughtContent.innerHTML = `<p class="text-gray-700">${item.thought || 'Your thoughts here...'}</p>`;

                        const authorSection = document.createElement('div');
                        authorSection.className = 'mt-4';
                        authorSection.innerHTML = `<p class="text-sm text-gray-500">- ${item.username || 'Author Name'}</p>`;

                        card.appendChild(profileSection);
                        card.appendChild(thoughtContent);
                        card.appendChild(authorSection);

                        dataContainer.appendChild(card);
                    });
                }
            };

            xhr.open('GET', 'data.json', true);
            xhr.send();
        });
    </script>
    <button class="bg-gray-600 text-white p-4 hover:bg-blue-700 rounded w-full fixed bottom-0 left-0 right-0 z-10 md:block" onclick="window.location.href='form.php'">POST</button>
</body>

</html>
