@extends('layouts.presensi')

@section('content')

        <div class="user-section text-center mb-4">
            <img src="{{asset('assetsk/img/sample/avatar/avatar1.jpg')}}" alt="User Avatar" class="rounded-circle mb-3 user-avatar" style="width: 64px">
            <h2 class="mb-0">{{Auth::guard("karyawan")->user()->nama_lengkap}}</h2>
            <span class="text-light">{{Auth::guard("karyawan")->user()->jabatan}}</span>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-3 menu-item">
                        <div class="menu-icon text-primary"><i class="fas fa-user-circle"></i></div>
                        <div class="menu-name">Profil</div>
                    </div>
                    <div class="col-3 menu-item">
                        <div class="menu-icon text-danger"><i class="fas fa-calendar-alt"></i></div>
                        <div class="menu-name">Cuti</div>
                    </div>
                    <div class="col-3 menu-item">
                        <div class="menu-icon text-warning"><i class="fas fa-history"></i></div>
                        <div class="menu-name">Histori</div>
                    </div>
                    <div class="col-3 menu-item">
                        <div class="menu-icon text-info"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="menu-name">Lokasi</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4">
            <div class="col-6">
                <div class="card presence-card">
                    <div class="card-body d-flex align-items-center">
                        <!-- Foto di sebelah kiri -->
                        <div class="me-3">
                            @if ($presensihariini != null)
                                <img src="{{ asset('storage/uploads/absensi/'.$presensihariini->foto_in) }}" alt="" style="width: 60px; border-radius: 10px; box-shadow: 0 0 0 2px white;">
                            @else
                                <ion-icon name="camera"></ion-icon>
                            @endif
                        </div>
                        
                        <!-- Teks Masuk dan Jam di sebelah kanan -->
                        <div>
                            <h5 class="card-title text-white">Masuk</h5>
                            <p class="card-text text-white" id="checkInTime">{{ $presensihariini != null ? $presensihariini->jam_in : "Belum Absen" }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card presence-card out">
                    <div class="card-body d-flex align-items-center">
                        <!-- Foto di sebelah kiri -->
                        <div class="me-3">
                            @if ($presensihariini != null && $presensihariini->foto_out != null)
                                <img src="{{ asset('storage/uploads/absensi/'.$presensihariini->foto_out) }}" alt="" style="width: 60px; border-radius: 10px; box-shadow: 0 0 0 2px white;">
                            @else
                                <ion-icon name="camera"></ion-icon>
                            @endif
                        </div>
                        
                        <!-- Teks Pulang dan Jam di sebelah kanan -->
                        <div>
                            <h5 class="card-title text-white">Pulang</h5>
                            <p class="card-text text-white" id="checkOutTime">{{ $presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : "Belum Absen" }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title mb-4">Rekap Presensi Bulan {{ $namabulan[$bulanini]}} Tahun {{ $tahunini}}</h4>
                <div class="row text-center">
                    <div class="col-3">
                        <div class="recap-icon text-success"><i class="fas fa-user-check"></i></div>
                        <div class="recap-name">Hadir</div>
                        <div class="recap-count">{{ $rekappresensi->jmlhadir }}</div>
                    </div>
                    <div class="col-3">
                        <div class="recap-icon text-primary"><i class="fas fa-calendar-check"></i></div>
                        <div class="recap-name">Izin</div>
                        <div class="recap-count">10</div>
                    </div>
                    <div class="col-3">
                        <div class="recap-icon text-info"><i class="fas fa-procedures"></i></div>
                        <div class="recap-name">Sakit</div>
                        <div class="recap-count">10</div>
                    </div>
                    <div class="col-3">
                        <div class="recap-icon text-warning"><i class="fas fa-clock"></i></div>
                        <div class="recap-name">Telat</div>
                        <div class="recap-count">{{ $rekappresensi->jmlterlambat }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="presenceTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="month-tab" data-bs-toggle="tab" data-bs-target="#month"
                            type="button" role="tab" aria-controls="month" aria-selected="true">Bulan Ini</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="leaderboard-tab" data-bs-toggle="tab" data-bs-target="#leaderboard"
                            type="button" role="tab" aria-controls="leaderboard"
                            aria-selected="false">Leaderboard</button>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="presenceTabContent">
                    <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="month-tab">
                        <ul class="list-group list-group-flush">
                            @foreach ($historibulanini as $d)
                            @php
                                $path = asset ('storage/uploads/absensi/'.$d->foto_in);
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-fingerprint me-2 text-primary"></i>
                                    {{ date("d-m-Y", strtotime($d->tgl_presensi)) }}
                                </div>
                                <div>
                                    <span class="badge bg-success me-1">{{ $d->jam_in }}</span>
                                    <span class="badge bg-danger">{{ $presensihariini != null && $d->jam_out != null ? $d->jam_out : "Belum Absen" }}</span>
                                </div>
                            </li>
                            <!-- Add more list items for other dates -->
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="leaderboard" role="tabpanel" aria-labelledby="leaderboard-tab">
                        <ul class="list-group list-group-flush">
                            @foreach ($leaderboard as $d)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/40" alt="User Avatar"
                                        class="rounded-circle me-3">
                                    <div>
                                        <strong>{{ $d->nama_lengkap }}</strong><br>
                                        <small class="text-muted">{{$d->jabatan}}</small>
                                    </div>
                                </div>
                                <span class="text-primary">{{ $d->jam_in }}</span>
                            </li>
                            <!-- Add more list items for other users -->
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
          
            
        </div>
@endsection