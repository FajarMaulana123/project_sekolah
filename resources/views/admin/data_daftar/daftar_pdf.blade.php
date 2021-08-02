<!DOCTYPE html>
<html>
<head>
	<title>Hasil Seleksi Pendaftaran</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Hasil Seleksi Pendaftaran {{$lo->nama_sekolah}}</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>E-mail</th>
                <th>Asal Sekolah</th>
                <th>Jalur Pendaftaran</th>
                <th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $sekolah)
			<tr>
                <td>{{$i++}}</td>
                <td>{{$sekolah['nama']}}</td>
                <td>{{$sekolah['email']}}</td>
                <td>
                    {{$sekolah['asal_sekolah']}}
                </td>
                <td>
                    {{$sekolah['jalur']}}
                </td>
                <td>
                    @if($sekolah['status'] == 0)
                    <span class="badge badge-warning">Menunggu</span>
                    @elseif($sekolah['status'] == 1)
                    <span class="badge badge-success">Di terima</span>
                    @elseif($sekolah['status'] == 2)
                    <span class="badge badge-danger">Di tolak</span>
                    @endif
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>