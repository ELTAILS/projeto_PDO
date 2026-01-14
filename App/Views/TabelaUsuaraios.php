<?php if (!empty($erro)): ?>
    <p style="color:red"><?= $erro ?></p>
<?php endif; ?>

<table class="table table-dark table-striped" style="margin-top: 2rem;">
    <thead>
        <tr>
            <th scope="col"><i class="fa-solid fa-id-badge"></i>ID</th>
            <th scope="col"><i class="fa-solid fa-user"></i>Nome</th>
            <th scope="col"><i class="fa-solid fa-at"></i>Email</th>
            <th scope="col"><i class="fa-solid fa-mobile"></i>Telefone</th>
            <th scope="col"><i class="fa-solid fa-trash"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $u):?>

            <tr>
                <th scope="row"><?= htmlspecialchars($u['id']) ?></th>
                <td><?= htmlspecialchars($u['nome']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><?= htmlspecialchars($u['telefone']) ?></td>
                <td><p><a href="auth.php?deletar=<?= $u['id'] ?>" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" onclick="return confirm('Tem certeza que deseja excluir este usuário?')"> Excluir</a></p></td>
            </tr>

        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Nenhum usuário cadastrado!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>