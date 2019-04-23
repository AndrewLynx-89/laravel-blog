<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Изменить статью
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    {{Form::open([
        'route'	=>	['articles.update', $article->id],
        'files'	=>	true,
        'method'	=>	'put'
    ])}}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Обновляем статью</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Название')}}
                        {{Form::text('title', $article->title, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Заколовот поста'])}}
                    </div>

                    <div class="form-group">
                        <img src="{{$article->getImage()}}" alt="" class="img-responsive" width="200">
                        {{Form::label('exampleInputFile', 'Изображение записи')}}
                        {{Form::file('image',['id' => 'exampleInputFile'])}}
                        <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        {{Form::select('category_id', $categories, $article->getCategoryID(),['class' => 'form-control select2'])}}
                    </div>
                    <div class="form-group">
                        <label>Теги</label>
                        {{Form::select('tags[]', $tags, $selectedTags, ['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги'])}}
                    </div>
                    <!-- Date -->
                    <div class="form-group">
                        {{Form::label('datepicker', 'Дата:')}}
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {{Form::text('date', $article->date, ['class' => 'form-control pull-right','id' => 'datepicker', 'placeholder' => 'Заколовот поста'])}}
                        </div>
                        <!-- /.input group -->
                    </div>

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            {{Form::checkbox('is_featured', '1', $article->is_featured, ['class'=>'minimal'])}}
                        </label>
                            {{Form::label('is_featured', 'Рекомендовать')}}
                    </div>
                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            {{Form::checkbox('status', '1', $article->status, ['class'=>'minimal'])}}
                        </label>
                            {{Form::label('minimal', 'Черновик')}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полный текст</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$article->description}}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Полный текст</label>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$article->content}}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('articles.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-warning pull-right">Изменить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{Form::close()}}
    </section>
    <!-- /.content -->
</div>