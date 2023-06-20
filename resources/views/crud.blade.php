<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@vite(['resources/js/app.js'])
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- method : get, post, put, delete -->
                <form class="row g-3" action="{{route('crudprocess')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                      <label for="" class="form-label">NIM</label>
                      <input type="text" name="nim" value="{{old('nim') ?? $mhsedit[0]->nim ?? ''}}" class="form-control @error('nim') is-invalid @enderror" id="">
                      @error('nim')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <label for="" class="form-label">Nama</label>
                      <input type="text" name="nama" value="{{old('nama') ?? $mhsedit[0]->nama ?? ''}}" class="form-control @error('nama') is-invalid @enderror" id="">
                      @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="" class="form-label">Gambar</label>
                      <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror" id="" placeholder="Silahkan Pilih File">
                      @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($mahasiswa as $mhs)    
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$mhs->nim}}</td>
                        <td>{{$mhs->nama}}</td>
                        <td><img src="{{asset('storage')}}/upload/{{$mhs->gambar}}" alt="" height="100px" width="150px"></td>
                        <td>
                          <a href="{{ route('formcrud', $mhs->id)  }}" class="btn btn-info">Edit</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>