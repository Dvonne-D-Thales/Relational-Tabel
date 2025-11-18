<x-admin.layout>

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
            max-width: 1200px;
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

        /* Cards */
        .card {
            background: #1e293b;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
            overflow: hidden;
            border: 1px solid #334155;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 15px 25px rgba(0,0,0,0.4);
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
        }

        thead {
            background: var(--primary-light);
        }

        th, td {
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

        /* Galaksi canvas */
        #dashboardGalaxy {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }

        @media (max-width: 640px) {
            th, td {
                padding: 10px;
                font-size: 13px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>

    <body>

        {{-- Galaksi Background --}}
        <canvas id="dashboardGalaxy"></canvas>

        <div class="container">
            <h1>Dashboard</h1>

            {{-- Statistik Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="card">Jumlah Siswa<br><strong>128</strong></div>
                <div class="card">Jumlah Guru<br><strong>24</strong></div>
                <div class="card">Jumlah Kelas<br><strong>12</strong></div>
                <div class="card">Jumlah Mapel<br><strong>8</strong></div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                {{-- Tabel Aktivitas Kiri --}}
              <div class="card">
                <h2>Aktivitas Terbaru</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">1</td>
                            <td>🧑‍🎓 Siswa baru ditambahkan: <strong>Andi Setiawan</strong></td>
                        </tr>
                        <tr>
                            <td class="no">2</td>
                            <td>📚 Guru baru bergabung: <strong>Ibu Lestari</strong></td>
                        </tr>
                        <tr>
                            <td class="no">3</td>
                            <td>🏫 Kelas 8A diperbarui</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Grafik Kanan --}}
            <div class="card chart-placeholder">
                Grafik
            </div>
        </div>
    </div>


            {{-- Jadwal Pelajaran --}}
            <div class="mt-8">
                @php
                    $mapel = ['Matematika', 'Bahasa Inggris', 'Game Dev', 'IPA', 'IPS', 'Web Dev'];
                    $guru = ['Bu Siti', 'Pak Rudi', 'Pak Andi', 'Bu Nia', 'Bu Wati', 'Pak Budi'];
                    $durasi = 90*60;
                    $mulai = strtotime('07:00');
                    $hariList = ['Senin'=>5,'Selasa'=>6,'Rabu'=>5,'Kamis'=>5,'Jumat'=>2,'Sabtu'=>4];
                @endphp

                @foreach ($hariList as $hari => $jumlahPelajaran)
                    <div class="card mt-4">
                        <h2>Jadwal Hari {{ $hari }}</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th class="no">No</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Guru Pengampu</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $jam=$mulai; @endphp
                                @for ($i=0; $i<$jumlahPelajaran; $i++)
                                    @php
                                        $jam_selesai = $jam+$durasi;
                                        $waktu = date('H:i',$jam).' - '.date('H:i',$jam_selesai);
                                        $jam = $jam_selesai;
                                    @endphp
                                    <tr>
                                        <td class="no">{{ $i+1 }}</td>
                                        <td>{{ $mapel[$i % count($mapel)] }}</td>
                                        <td>{{ $guru[$i % count($guru)] }}</td>
                                        <td>{{ $waktu }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- JS Galaksi --}}
        <script>
            const canvas = document.getElementById('dashboardGalaxy');
            const ctx = canvas.getContext('2d');

            function resizeCanvas() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
            resizeCanvas();
            window.addEventListener('resize', resizeCanvas);

            // Stars
            const stars=[];
            const STAR_COUNT=150;
            for(let i=0;i<STAR_COUNT;i++){
                stars.push({
                    x:Math.random()*canvas.width,
                    y:Math.random()*canvas.height,
                    radius:Math.random()*1.5,
                    color:['#fff','#aabfff','#d1c4ff'][Math.floor(Math.random()*3)],
                    speed:Math.random()*0.3+0.05
                });
            }

            // Shooting stars
            const shootingStars=[];
            function addShootingStar() {
                shootingStars.push({
                    x:Math.random()*canvas.width,
                    y:Math.random()*canvas.height*0.3,
                    len: Math.random()*150+50,
                    speed: Math.random()*6+4,
                    angle: Math.random()*Math.PI/3 - Math.PI/6
                });
            }
            setInterval(addShootingStar,3000);

            function animate(){
                ctx.clearRect(0,0,canvas.width,canvas.height);

                // Stars
                stars.forEach(s=>{
                    ctx.beginPath();
                    ctx.arc(s.x,s.y,s.radius,0,Math.PI*2);
                    ctx.fillStyle=s.color;
                    ctx.fill();
                    s.x -= s.speed;
                    if(s.x<0) s.x=canvas.width;
                });

                // Shooting stars
                for(let i=shootingStars.length-1;i>=0;i--){
                    const s=shootingStars[i];
                    const x2 = s.x - s.len*Math.cos(s.angle);
                    const y2 = s.y - s.len*Math.sin(s.angle);
                    const gradient = ctx.createLinearGradient(s.x,s.y,x2,y2);
                    gradient.addColorStop(0,'rgba(255,255,255,1)');
                    gradient.addColorStop(1,'rgba(255,255,255,0)');
                    ctx.strokeStyle = gradient;
                    ctx.lineWidth=2;
                    ctx.beginPath();
                    ctx.moveTo(s.x,s.y);
                    ctx.lineTo(x2,y2);
                    ctx.stroke();

                    s.x -= s.speed*Math.cos(s.angle);
                    s.y -= s.speed*Math.sin(s.angle);

                    if(s.x<0 || s.y>canvas.height) shootingStars.splice(i,1);
                }

                requestAnimationFrame(animate);
            }
            animate();
        </script>

    </body>
</x-admin.layout>
