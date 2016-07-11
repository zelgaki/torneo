<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    //     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function authorize()
    {
        return true;
    }

    public function listar($datos)
    {
        if (isset($datos["token_social"])) {
            $query = $this->where("token_social", $datos["token_social"]);
            $usuario = $query->get()->toArray();
        } else {
            $query = $this->leftJoin("acl_rol as r", "r.id", "=", "users.rol_id");
            if (isset($datos["nombre"])) {
                //dd($datos);
                $query->where('nombre', 'LIKE', "%$datos[nombre]%");
            }
            $usuario = $query->get()->toArray();
        }

        return $usuario;
    }

    public function isValid($data)
    {
        $rules = array(
            'email' => 'email|unique:users',
            'usuario' => 'unique:users',
            'nombre' => 'min:4|max:40',
            'password' => 'min:8|confirmed'
        );

        // Si el usuario existe:
        if ($this->exists) {
            //Evitamos que la regla “unique” tome en cuenta el email del usuario actual
            $rules['email'] .= ',email,' . $this->id;
            $rules['usuario'] .= ',usuario,' . $this->id;
        } elseif (isset($data["token_social"]))// Si no existe...
        {
            // La clave es obligatoria:
        } else {

            $rules['password'] .= '|required';
            $rules['email'] .= '|required';
            $rules['usuario'] .= '|required';
            $rules['nombre'] .= '|required';

        }

        $validator = \Validator::make($data, $rules);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    public function validAndSave($data)
    {
        // Revisamos si la data es válida
        if ($this->isValid($data)) {
            //dd($data);
            // Si la data es valida se la asignamos al usuario
            $this::where('id', '=', $data["id"])->update($data);
            //$this->fill($data);
            // Guardamos el usuario
            //$this->save();

            return true;
        }

        return false;
    }


}
