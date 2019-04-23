<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Меняем тег</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['uploads.update',$file->id], 'method'=>'put', 'files'	=>	true])}}
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Заголовок')}}
                        {{Form::text('title', $file->title, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Заколовок'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Краткое описание')}}
                        {{Form::text('description', $file->descriprion, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Краткое описание'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('exampleInputFile', 'Загрузить файл')}}
                        {{Form::file('file_name',['id' => 'exampleInputFile'])}}
                        <p>{{$file->file_name}}</p>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('uploads.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-warning pull-right">Изменить</button>
            </div>
            <!-- /.box-footer-->
            {{Form::close()}}
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>