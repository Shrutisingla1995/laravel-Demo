<h3>Products List:</h3>
<tbody>
  @foreach ($products as $product)
  <tr>
    <!-- Task Name -->
    <td >
      <div class="table-card">
        <div><strong>Name: </strong>{{ $product['name'] }}</div>
        <div><strong>Price: </strong>{{ $product['price'] }}</div>
      </div>
      <br />
    </td>
  </tr>
  @endforeach
</tbody>
<style>
.table-card{
  background: #efefee;
  border-radius: 5px;
  padding: 10px;
  width: 25%;
}
.table-card:hover{
  background: #fefefe;
  border:1px solid blue;
}

</style>
