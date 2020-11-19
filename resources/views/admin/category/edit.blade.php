@extends('admin.layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Редактировай давай</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" enctype="multipart/form-data"
                              action="{{route('category.update',$category->id)}}">
                            @method('put')
                            @csrf


                            <div class="form-row">
                                <div class="col-md-6">
                                    <img class="card-img-right "
                                         src="{{--Storage::url($set -> image)--}}" alt="Значок [200 x 250]"
                                         style="width: 100%">
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="$category-title"
                                               class="col-form-label text-md-right">Название категории</label>

                                        <input type="text" class="form-control" name="title"
                                               value="{{$category->title}}"
                                               autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="category-description"
                                               class="col-form-label text-md-right">Описание категории</label>


                                        <input type="text" class="form-control" name="description"
                                               value="{{$category->description}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="category-slug"
                                               class="col-form-label text-md-right">url(slug)</label>


                                        <input type="text" class="form-control" name="slug"
                                               value="{{$category->slug}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="parent-id" class=" col-form-label ">Родительская
                                            категория</label>

                                            <select name="parent_id"
                                                    class="form-control"
                                                    placeholder="Выберите категорию"
                                                    required>
                                                @foreach($parentCategories as $parentCategory)
                                                    <option value="{{ $parentCategory->id }}">
                                                        {{ $parentCategory->title }}
                                                    </option>
                                                @endforeach
                                            </select>

                                    </div>


                                    <div class="form-group">
                                        <label for="company_id"
                                               class="col-form-label">Дистрибьютор комплекта</label>

                                        <select name="company_id"
                                                class="form-control"
                                                placeholder="Выберите дистрибьютора"
                                                required>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}"

                                                        @if (
                                                            $company->id == $category->company_id)
                                                        selected
                                                    @endif
                                                >
                                                    {{ $company->title }}</option>

                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="form-group custom-file mt-4 ">
                                        <label class="custom-file-label" for="customFile">Изменить/добавить
                                            изображение комплекта</label>
                                        <input type="file" name="image" class="custom-file-input" id="customFile">

                                    </div>


                                    <div class="button mt-2 offset-md-9">
                                        <button type="submit" class="btn btn-primary ">
                                            {{ __('ИЗМЕНИТЬ') }}
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection