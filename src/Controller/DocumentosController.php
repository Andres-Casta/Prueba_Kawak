<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Documentos Controller
 *
 * @property \App\Model\Table\DocumentosTable $Documentos
 * @method \App\Model\Entity\Documento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DocumentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $documentos = $this->paginate($this->Documentos);
        //conexion a la base datos de la app
		$ConnectionManager = new ConnectionManager();
		$dbApp  = $ConnectionManager->get('default');    
        //Consulta para los procesos
        $sql = "SELECT * FROM procesos";
		$consulta = $dbApp->query($sql);
        foreach($consulta as $valor) {		
            //Array para el mostrar datos en tabla		
            $procesos[$valor[0]] = $valor[1];
        }
        //Consulta para los tipo de documentos
        $sql = "SELECT * FROM tipodocs";
		$consulta = $dbApp->query($sql);
        foreach($consulta as $valor) {				
            $tipodocs[$valor[0]] = $valor[1];
        }

        $this->set(compact('documentos','procesos','tipodocs'));
    }

    /**
     * View method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $documento = $this->Documentos->get($id, [
            'contain' => [],
        ]);

        //conexion a la base datos de la app
		$ConnectionManager = new ConnectionManager();
		$dbApp  = $ConnectionManager->get('default');    
        //Consulta para los procesos
        $sql = "SELECT * FROM procesos";
		$consulta = $dbApp->query($sql);
        foreach($consulta as $valor) {		
            //Array para el mostrar datos en tabla		
            $procesos[$valor[0]] = $valor[1];
        }
        //Consulta para los tipo de documentos
        $sql = "SELECT * FROM tipodocs";
		$consulta = $dbApp->query($sql);
        foreach($consulta as $valor) {				
            $tipodocs[$valor[0]] = $valor[1];
        }

        $this->set(compact('documento','procesos','tipodocs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //conexion a la base datos de la app
		$ConnectionManager = new ConnectionManager();
		$dbApp  = $ConnectionManager->get('default');    
        //Consulta para los procesos
        $sql = "SELECT * FROM procesos";
		$consulta = $dbApp->query($sql);
        foreach($consulta as $valor) {		
            //Array para el select		
            $procesos[$valor[0]] = $valor[1];
            //array para prefijos
            $prefijo_pro[$valor[0]] = $valor[2];
        }
        //Consulta para los tipo de documentos
        $sql = "SELECT * FROM tipodocs";
		$consulta = $dbApp->query($sql);
        foreach($consulta as $valor) {				
            $tipodocs[$valor[0]] = $valor[1];
            $prefijo_tip[$valor[0]] = $valor[2];
        }
        //
        $documento = $this->Documentos->newEmptyEntity();
        //Post de formulario de insertar
        if ($this->request->is('post')) {
            $sql = "SELECT count(*) FROM documentos";
		    $consulta = $dbApp->query($sql);
            foreach($consulta as $valor) {				
                $cons=$valor[0];
            }
            //se toman lo valores de los input
            $DOC_NOMBRE = $_POST['DOC_NOMBRE'];            
            $DOC_CONTENIDO = $_POST['DOC_CONTENIDO'];
            $DOC_ID_TIPO = $_POST['DOC_ID_TIPO'];
            $DOC_ID_PROCESO = $_POST['DOC_ID_PROCESO'];
            //Se contatena con los prefijos par crear el codigo
            $DOC_CODIGO =  $prefijo_tip[$DOC_ID_TIPO]."-".$prefijo_pro[$DOC_ID_PROCESO]."-".$cons;
            //Insercion de datos
            $sql = "INSERT INTO documentos ( `DOC_NOMBRE`, `DOC_CODIGO`, `DOC_CONTENIDO`, `DOC_ID_TIPO`, `DOC_ID_PROCESO`)
             values('$DOC_NOMBRE', '$DOC_CODIGO', '$DOC_CONTENIDO',$DOC_ID_TIPO,$DOC_ID_PROCESO)";
		    $consulta = $dbApp->query($sql);
            $this->redirect(
				array('controller' => 'documentos', 'action' => 'index')
			);
            $this->Flash->success(__('Documento almacenado correctamente.'));
        }   
        //Se envian datos iniciales a la vista y se carga la información        
        $this->set(compact('documento','procesos','tipodocs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $documento = $this->Documentos->get($id, [
            'contain' => [],
        ]);
        //conexion a la base datos de la app
		$ConnectionManager = new ConnectionManager();
		$dbApp  = $ConnectionManager->get('default');    
        //Consulta para los procesos
        $sql = "SELECT * FROM procesos";
		$consulta = $dbApp->query($sql);
        foreach($consulta as $valor) {		
            //Array para el select		
            $procesos[$valor[0]] = $valor[1];
            //array para prefijos
            $prefijo_pro[$valor[0]] = $valor[2];
        }
        //Consulta para los tipo de documentos
        $sql = "SELECT * FROM tipodocs";
		$consulta = $dbApp->query($sql);
        foreach($consulta as $valor) {				
            $tipodocs[$valor[0]] = $valor[1];
            $prefijo_tip[$valor[0]] = $valor[2];
        }
        //
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            //se toman lo valores de los input
            $DOC_NOMBRE = $_POST['DOC_NOMBRE'];            
            $DOC_CONTENIDO = $_POST['DOC_CONTENIDO'];
            $DOC_ID_TIPO = $_POST['DOC_ID_TIPO'];
            $DOC_ID_PROCESO = $_POST['DOC_ID_PROCESO'];
            //Se contatena con los prefijos par crear el codigo
            $DOC_CODIGO =  $prefijo_tip[$DOC_ID_TIPO]."-".$prefijo_pro[$DOC_ID_PROCESO]."-".$id;
            //Insercion de datos
            $sql = "UPDATE documentos SET `DOC_NOMBRE`='$DOC_NOMBRE', `DOC_CODIGO`='$DOC_CODIGO',
             `DOC_CONTENIDO`='$DOC_CONTENIDO', `DOC_ID_TIPO`=$DOC_ID_TIPO, `DOC_ID_PROCESO`=$DOC_ID_PROCESO
             WHERE DOC_ID =".$id;
		    $consulta = $dbApp->query($sql);
            $this->redirect(
				array('controller' => 'documentos', 'action' => 'index')
			);
            $this->Flash->success(__('Documento Actualizado correctamente.'));
        }
         //Se envian datos iniciales a la vista y se carga la información        
         $this->set(compact('documento','procesos','tipodocs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Documento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $documento = $this->Documentos->get($id);
        if ($this->Documentos->delete($documento)) {
            $this->Flash->success(__('The documento has been deleted.'));
        } else {
            $this->Flash->error(__('The documento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
