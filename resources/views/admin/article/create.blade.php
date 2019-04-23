<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить статью
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    {{Form::open([
            'route'	=> 'articles.store',
            'files'	=>	true
        ])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем статью</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Название')}}
                        {{Form::text('title', null, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Заколовот поста'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('exampleInputFile', 'Изображение записи')}}
                        {{Form::file('image',['id' => 'exampleInputFile'])}}
                        <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                    </div>
                    <div class="form-group">
                        {{Form::label('cat_select', 'Категории')}}
                        {{Form::select('category_id', $categories, null,['class' => 'form-control select2', 'id' => 'cat_select'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('tags_select', 'Теги')}}
                        {{Form::select('tags[]', $tags, null, ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги', 'id' => 'tags_select'])}}
                    </div>
                    <!-- Date -->
                    <div class="form-group">
                        {{Form::label('datepicker', 'Дата:')}}
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{Form::text('date', null, ['class' => 'form-control pull-right','id' => 'datepicker', 'placeholder' => 'Заколовот поста'])}}
                        </div>
                        <!-- /.input group -->
                    </div>

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            {{Form::checkbox('is_featured', 1, false,['class' => 'minimal', 'id' => 'is_featured'])}}
                        </label>
                            {{Form::label('is_featured', 'Рекомендовать')}}
                    </div>

                    <div class="form-group">
                        <label>
                            {{Form::checkbox('status', 1, false,['class' => 'minimal', 'id' => 'minimal'])}}
                        </label>
                            {{Form::label('minimal', 'Черновик')}}
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полный текст</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полный текст</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('articles.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{Form::close()}}
    </section>
    <!-- /.content -->
</div>