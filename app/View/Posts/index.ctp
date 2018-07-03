<h1>Blog posts</h1>
<p><?php echo $this->Html->link('add a post', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>action</th>
        <th>created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link(
                $post['Post']['title'],
                array('action' => 'view', $post['Post']['id'])
            ); ?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'are you sure')
            ); ?>
            <?php echo $this->Html->link(
                'edit',
                array('action' => 'edit', $post['Post']['id'])
            ); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>