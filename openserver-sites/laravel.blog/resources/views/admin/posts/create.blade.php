@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Статьи</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Создание статьи</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="2" placeholder="Введите описание">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Текст</label>
                                    <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="4" placeholder="Введите текст">{{ old('content') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                        @foreach($categories as $k=>$v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select id="tags" name="tags[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Выберите тег" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        @foreach($tags as $k=>$v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input name="thumbnail" type="file" class="custom-file-input" id="thumbnail">
                                        <label class="custom-file-label" for="thumbnail">Выберите изображение</label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('modules/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('modules/summernote/lang/summernote-ru-RU.min.js') }}"></script>
    <script>
        $("#content").summernote({
            lang: "ru-RU",
            height: 160,
        });
    </script>
@endpush
