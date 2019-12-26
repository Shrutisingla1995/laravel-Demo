<h3 class="panel-heading">Tasks List</h3>
<tbody>
  @foreach ($tasks as $task)
  <tr>
    <!-- Task Name -->
    <td class="table-text">
      <div>{{ $task->name }}</div>
    </td>
  </tr>
  @endforeach
</tbody>
<style>
.panel-heading{
  color: grey;
  font-size: 20px;
  font-family: cursive;
}
</style>
