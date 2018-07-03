<?php

class PostsController extends AppController
{
	public $helpers = array('Html', 'Form');
	public $component = array('Flash');

	public function index()
	{
		$this->set('posts', $this->Post->find('all'));
	}

	public function view($id = null)
	{
		if (!$id) {
			throw new NotFoundException(__("Invalid post"));
		}

		$post = $this->Post->findById($id);
		if(!$post) {
			throw new NotFoundException(__("Invalid post"));
		}
		$this->set('post', $post);
	}

	public function add()
	{
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Flash->Success(__('Your post has been saved'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('unbale to add your post'));
		}
	}

	public function edit($id = NULL)
	{
		if(!$id) {
			throw new NotFoundException(__('Invalid Post'));
		}

		$post = $this->Post->findById($id);
		if(!$post) {
			throw new NotFoundException(__('invalid Post'));
		}

		if($this->request->is(array('put', 'post'))) {
			$this->post->id = $id;
			if($this->post->save($this->request->data)) {
				$this->Flash->Success(__('Your post has been updated'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Unable to update your post'));
		}

		if(!$this->request->data) {
			$this->request->data = $post;
		}
	}

	public function delete($id)
	{
		if($this->request->is('get')) {
			throw new MethodNotAllowException();
		}

		if($this->Post->delete($id)) {
			$this->Flash->Success(__('The post with id %s has been delete', h($id)));
		} else {
			$this->Flash->error(__('The post with id %s couldn\'t delete', h($id)));
		}

		return $this->redirect(array('action' => 'index'));
	}
}


?>