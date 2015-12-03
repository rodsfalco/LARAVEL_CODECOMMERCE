<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['user_id', 'total', 'status'];

    public function items() {
        return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user() {
        return $this->belongsTo('CodeCommerce\User');
    }

    /*
     * Auxiliares
     */

    public function getStatusStrAttribute() {
        $retorno = '';

        switch($this->status) {
            case 0:
                $retorno = 'Aberto';
                break;
            case 1:
                $retorno = 'Pagamento aprovado';
                break;
            case 2:
                $retorno = 'Separação em estoque';
                break;
            case 3:
                $retorno = 'Na transportadora';
                break;
            case 4:
                $retorno = 'Entregue';
                break;
            case 5:
                $retorno = 'Cancelado';
                break;
        }

        return $retorno;
    }

    public function proximoStatus() {
        $retorno = '';

        switch($this->status) {
            case 0:
                $retorno = 'Aprovar pagamento';
                break;
            case 1:
                $retorno = 'Separar em estoque';
                break;
            case 2:
                $retorno = 'Liberar entrega';
                break;
            case 3:
                $retorno = 'Finalizar pedido';
                break;
        }

        return $retorno;
    }

    public function isAberto() {
        return $this->status == 0;
    }

    public function isAtivo() {
        return $this->status != 4 && $this->status != 5;
    }

}
