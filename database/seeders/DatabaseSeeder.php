<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use App\Models\Imagene;
use App\Models\Noticia;
use App\Models\NoticiaEtiqueta;
use App\Models\Proyecto;
use App\Models\Servicio;
use App\Models\Tproyecto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //creamos Roles
        $superadmin = Role::create(['name' => 'Superadmin']);
        $admin = Role::create(['name'=>'Admin']);
        $usuario = Role::create(['name'=>'Usuario']);
        
        Permission::create(['name'=>'dashboard.administrators.index','description'=>'Dashboard Administrador Inicio'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.create','description'=>'Dashboard Administrador Crear'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.store','description'=>'Dashboard Administrador Almacenar'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.edit','description'=>'Dashboard Administrador Editar'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.update','description'=>'Dashboard Administrador Actualizar'])->syncRoles([$superadmin]);
        Permission::create(['name'=>'dashboard.administrators.destroy','description'=>'Dashboard Administrador Destruir'])->syncRoles([$superadmin]);

        
        /* \App\Models\User::factory(10)->create(); */
        $usuario1 = new User;
        $usuario1->name = "Davis Williams Aparicio Palomino";
        $usuario1->email = "daparicio@idexperujapon.edu.pe";
        $usuario1->password = bcrypt('B3n3tt0n_');
        $usuario1->sexo="Masculino";
        $usuario1->tipo = "Superadmin";
        $usuario1->save();
        $usuario1->assignRole('Superadmin');
        //tipos de proyectos
        $tipo1 = Tproyecto::create(['nombre'=>'Investigacion y Desarrollo']);
        $tipo2 = Tproyecto::create(['nombre'=>'Recurso Educativo']);
        $tipo3 = Tproyecto::create(['nombre'=>'Desarrollo Empresarial']);
        $tipo4 = Tproyecto::create(['nombre'=>'Desarrollo Comunitario']);
        //proyecto
        $proyecto = Proyecto::create([
            'nombre'=>'Proyecto Primero del Sistema',
            'descripcion'=>"
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                It has survived not only five centuries, but also the leap into electronic typesetting, 
                remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            ",
            'fecha'=>'10/10/10',
            'user_id'=>$usuario1->id,
            'tproyecto_id'=>$tipo1->id,
        ]);
        //ingresando etiquetas
        $etiqueta1 = Etiqueta::create([
            'nombre'=>'Noticias'
        ]);
        $etiqueta2 = Etiqueta::create([
            'nombre'=>'Eventos'
        ]);
        $etiqueta3 = Etiqueta::create([
            'nombre'=>'Atencion'
        ]);
        //ingresando noticias
        $noticia1 = Noticia::create([
            'titulo'=>'¿Dónde puedo conseguirlo?',
            'texto'=>'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.',
            'fecha'=>'2022/11/23',
            'user_id'=>$usuario1->id,
        ]);
        $noticia2 = Noticia::create([
            'titulo'=>'¿Por qué lo usamos?',
            'texto'=>'s un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí".',
            'fecha'=>'2022/11/23',
            'user_id'=>$usuario1->id,
        ]);
        //etiquetando la noticia
        NoticiaEtiqueta::create([
            'etiqueta_id'=>$etiqueta1->id,
            'noticia_id'=>$noticia1->id
        ]);
        NoticiaEtiqueta::create([
            'etiqueta_id'=>$etiqueta2->id,
            'noticia_id'=>$noticia1->id
        ]);
        NoticiaEtiqueta::create([
            'etiqueta_id'=>$etiqueta1->id,
            'noticia_id'=>$noticia2->id
        ]);
        NoticiaEtiqueta::create([
            'etiqueta_id'=>$etiqueta2->id,
            'noticia_id'=>$noticia2->id
        ]);
        //poniendo imagen a la noticia?
        Imagene::create([
            'url'=>'img/noticias/fab01.jpg',
            'noticia_id'=>$noticia1->id
        ]);
        Imagene::create([
            'url'=>'img/noticias/fab02.jpg',
            'noticia_id'=>$noticia2->id
        ]);
        //agregando los servicios
        Servicio::create([
            'nombre'=>'¿Dónde puedo conseguirlo?',
            'url'=>'img/servicios/servicio01.png',
            'descripcion'=>'Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.'
        ]);
        Servicio::create([
            'nombre'=>'El pasaje estándar Lorem Ipsum, usado desde el año 1500.',
            'url'=>'img/servicios/servicio02.png',
            'descripcion'=>'"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."'
        ]);
        Servicio::create([
            'nombre'=>'Traducci�n hecha por H. Rackham en 1914',
            'url'=>'img/servicios/servicio03.png',
            'descripcion'=>'"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."'
        ]);
    }
}
