<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            {!! Form::open(['route' => 'tags.store']) !!}
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем тег</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {{Form::label('exampleInputEmail1', 'Название')}}
                        {{Form::text('title', null, ['class' => 'form-control','id' => 'exampleInputEmail1', 'placeholder' => 'Тег'])}}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('tags.index')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
             {!! Form::close() !!}
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>