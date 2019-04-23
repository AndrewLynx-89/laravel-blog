<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            {!! Form::open(['route' => 'uploads.store','files'	=>	true]) !!}
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем тег</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Заголовок')}}
                        {{Form::text('title', null, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Заколовок'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Краткое описание')}}
                        {{Form::text('description', null, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Заколовок'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('exampleInputFile', 'Загрузить файл')}}
                        {{Form::file('file_name',['id' => 'exampleInputFile'])}}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('uploads.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
             {!! Form::close() !!}
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>