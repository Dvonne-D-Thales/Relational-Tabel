<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --primary: #7c3aed;
            --primary-light: #2d1b69;
            --text-dark: #e2e8f0;
            --text-light: #a0aec0;
            --bg: #0f172a;
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Noto Sans", "Helvetica Neue", sans-serif;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text-dark);
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            position: relative;
            z-index: 2;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 700;
            text-align: left;
            color: var(--primary);
        }

        .card {
            background: #1e293b;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .3);
            overflow: hidden;
            border: 1px solid #334155;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        thead {
            background: var(--primary-light);
        }

        th,
        td {
            padding: 14px 16px;
            text-align: left;
        }

        th {
            font-weight: 600;
            color: var(--primary);
            font-size: 14px;
            letter-spacing: .5px;
        }

        tbody tr {
            transition: background 0.2s ease, transform 0.15s ease;
        }

        tbody tr:hover {
            background: rgba(124, 58, 237, 0.1);
            transform: scale(1.01);
        }

        .no {
            width: 60px;
            text-align: center;
            font-weight: 600;
            color: var(--text-light);
        }

        .star {
            position: fixed;
            width: 2px;
            height: 80px;
            background: linear-gradient(to top right, white, transparent);
            /* ekor kanan atas */
            opacity: 0.8;
            transform: rotate(45deg);
            /* arah diagonal */
            animation: fall 3s linear forwards;
            z-index: 1;
        }

        @keyframes fall {
            0% {
                transform: translate(0, 0) rotate(45deg);
                opacity: 1;
            }

            100% {
                transform: translate(-100vw, 100vh) rotate(45deg);
                opacity: 0;
            }
        }

        @media (max-width: 640px) {

            th,
            td {
                padding: 10px;
                font-size: 13px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>

    <body>
        <!-- Layer bintang -->
        <div id="stars"></div>

        <div class="container">
            <h1>Daftar Siswa</h1>
            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th class="no">NO</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Tanggal Lahir</th>
                            <th>Email</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $index => $s)
                            <tr>
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $s->name }}</td>
                                <td class="px-4 py-2">{{ $s->classroom->name ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $s->birthdate }}</td>
                                <td class="px-4 py-2">{{ $s->email }}</td>
                                <td class="px-4 py-2">{{ $s->address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            function createStar() {
                const star = document.createElement("div");
                star.classList.add("star");

                const fromTop = Math.random() < 0.5; // 50% dari atas, 50% dari kanan

                if (fromTop) {
                    // Muncul dari atas
                    star.style.top = Math.random() * window.innerHeight * 0.3 + "px";
                    star.style.left = Math.random() * window.innerWidth + "px";
                } else {
                    // Muncul dari kanan
                    star.style.top = Math.random() * window.innerHeight + "px";
                    star.style.left = window.innerWidth - 10 + "px";
                }

                star.style.animationDuration = (1.5 + Math.random() * 2.5) + "s";
                document.getElementById("stars").appendChild(star);
                setTimeout(() => star.remove(), 4000);
            }

            setInterval(createStar, 300);
        </script>
    </body>
</x-layout>
