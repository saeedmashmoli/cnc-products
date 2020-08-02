@extends('Admin.master')
@include('Admin.articles._Files')
@section('content')
    <div class="col-lg-12">
        <div class="page-header head-section">
            <h4>ویرایش مقاله</h4>
        </div>
        <div class="dropdown-divider bg-dark mb-5"></div>
        <form class="form-horizontal" action="{{ route('articles.update', ['article' => $article->slug ]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('Admin.section.errors')
            <div class="form-group col-12">
                <div class="col-lg-6">
                    <label for="title" class="control-label">عنوان</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="عنوان مقاله را وارد کنید" value="{{ $article->title }}">
                </div>
            </div>
            <div class="form-group col-lg-12">
                <label for="body" class="control-label">توضیحات</label>
                <textarea rows="5" class="form-control" name="body" id="body" placeholder="توضیحات مقاله را وارد کنید">{{ $article->body }}</textarea>
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-6">
                    <label for="product_id" class="control-label">محصولات مرتبط با ویدئو</label>
                    <select name="product_id[]" class="selectpicker" title='انتخاب کنید' multiple>
                        @foreach(\App\Product::whereStatus(1)->get() as $product)
                            <option value="{{$product->id}}" {{in_array($product->id, $article->products()->pluck('id')->toArray()) ? 'selected' : ''}}>{{$product->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-12">
                <div class="col-lg-3" style="direction: ltr">
                    <label for="poster" class="control-label">پوستر</label>
                    <input type="file" class="form-control" name="file" id="posterEdit">
                </div>
            </div>
            <div class="form-group col-lg-12">
                <div class="form-group col-lg-6 m-0">
                    <label for="gender">وضعیت</label>
                    <div class="col-lg-12">
                        <label class="custom-toggle">
                            <input type="radio" name="isPublish" value="1" {{$article->isPublish == 1 ? 'checked' : ''}}>
                            <span class="custom-toggle-slider" style="border-radius: 10% !important;"></span>
                        </label>
                        <label style="vertical-align:top;text-align: center">انتشار</label>
                        <span class="clearfix"></span>
                    </div>
                    <div class="col-lg-12">
                        <label class="custom-toggle">
                            <input type="radio" name="isPublish" value="0" {{$article->isPublish == 0 ? 'checked' : ''}}>
                            <span class="custom-toggle-slider" style="border-radius: 10% !important;"></span>
                        </label>
                        <label style="vertical-align:top;text-align: center">پیش نویس</label>
                        <span class="clearfix"></span>
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-10 float-right">
                <div class="col-lg-2 float-left">
                    <button type="submit" class="btn btn-primary float-left">ویرایش</button>
                </div>
            </div>
        </form>
    </div>
@endsection


