<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('articles.create')}}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Теги</th>
                        <th>Картинка</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td><a href="{{route('article.show', $article->slug)}}">{{$article->title}}</a></td>
                        <td>{{$article->getCategoryTitle()}}</td>
                        <td>{{$article->getTagsTitles()}}</td>
                        <td>
                            <img src="{{$article->getImage()}}" alt="Тут должна быть картинка" width="100">
                        </td>
                        <td>
                                <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info" style="float: left; margin-right: 10px;">Редактировать</a>

                                {{Form::open(['route'=>['articles.destroy', $article->id], 'method'=>'delete'])}}
                                <button onclick="return confirm('Вы уверены, что хотите удалить?')" type="submit" class="btn btn-danger"  style="float:left;">
                                    Удалить
                                </button>
                                {{Form::close()}}
                        </td>
                    </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>