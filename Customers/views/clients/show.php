<table class="table">
  <thead>
    <tr>
      <th scope="col">Id Nr.</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Personal ID</th>
      <th scope="col">Sąskaitos Nr.</th>
      <th scope="col">Balance</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td><?= $client['name'] ?></td>
      <td><?= $client['surname'] ?></td>
      <td><?= $client['personalId'] ?></td>
      <td><?= $client['iban'] ?></td>
      <td><?= $client['balance'] ?></td>
    </tr>
  </tbody>
</table>