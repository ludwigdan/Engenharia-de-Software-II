<table class="table table-striped table-hover">
    <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Status</th>
        <th>Editar</th>
        <th>Excluir</th>
    </thead>
    <tbody>
        <?php foreach ($lista as $item): ?>
        <tr>
            <td><?php echo $item['idaluno']; ?></td>
            <td><?php echo $item['nome']; ?></td>
            <td><?php echo $item['sexo']; ?></td>
            <td><?php echo ($item['status'])? "Ativo" : "Inativo"; ?></td>
            <td></td>
            <td><a href=""><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

