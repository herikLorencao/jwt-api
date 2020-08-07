<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo', 'produtoId'];
    protected $table = 'qrcodes';
    public $timestamps = false;

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function setProdutoIdAttribute(int $produtoId) {
        $this->attributes['produto_id'] = $produtoId;
    }
}
