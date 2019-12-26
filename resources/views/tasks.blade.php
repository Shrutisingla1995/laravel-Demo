<!-- Styles -->
<style>
  .form-group{
    text-align: center;
  }
  input{
    width: calc(100% - 850px);
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #b9b1b1;
    margin: 10px;
  }
  .task-btn{
    padding: 10px;
    background: blue;
    border-radius: 5px;
    color: white;
    border: none;
  }
  .panel-heading{
    color: grey;
    font-size: 20px;
    font-family: cursive;
  }
  .table-text{
    background: #efefef;
    padding: 10px;
    color: red;
    position: relative;
  }
  .delete-btn{
    background: none;
    border:none;
  }
  .delete-btn:hover{
    font-weight: bold;
    cursor: pointer;
  }

</style>
<div class="panel-body">
  <!-- New Task Form -->
  <form action="/new" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Task Name -->
    <div class="form-group">
      <label for="task" class="control-label"><h2>Add New Task in TO DO list:</h2></label>

      <div class="col-xs-6 field">
        <input type="text" name="name" id="task-name" class="form-control">
      </div>
    </div>
    <!-- Add Task Button -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-default task-btn">
          <i class="fa fa-plus"></i> Add Task
        </button>
      </div>
    </div>
  </form>
</div>
<!-- Current Tasks -->
@if (count($tasks) > 0)
<div class="panel panel-default">
  <div class="panel-heading">
    Current Tasks
  </div>
  <div class="panel-body">
    <table class="table table-striped task-table">
      <!-- Table Headings -->
      <thead>
        <th>&nbsp;</th>
      </thead>
      <!-- Table Body -->
      <tbody>
        @foreach ($tasks as $task)
        <tr>
          <!-- Task Name -->
          <td class="table-text">
            <div>{{ $task->name }}</div>
          </td>
          <!-- Delete Button -->
          <td>
            <form action="{{ url('task/'.$task->id) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <button type="submit" class="btn btn-danger delete-btn">
                x
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif
