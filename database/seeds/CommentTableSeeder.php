<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* Comments about Helmet */
        factory(App\Comment::class)->create([
            'uuid'  => '636e4b10-42c3-4daf-8c42-e841d38ee375',
            'data' 	=> 'Excelente producto. Uno de los más baratos con tecnología mips. Buenas terminaciones.',
            'article_uuid' => 'afc918e8-fe8d-42ce-a145-fba5d4cfbebb'
        ]);

        factory(App\Comment::class)->create([
            'uuid'  => 'e622cdd9-f645-4801-b94c-afa102867325',
            'data' 	=> 'Muy buen casco. Cómodo. Sistema mips.',
            'article_uuid' => 'afc918e8-fe8d-42ce-a145-fba5d4cfbebb'
        ]);

        factory(App\Comment::class)->create([
            'uuid'  => 'ad70db8d-ba64-4ed1-b5f5-97a4201752c4',
            'data' 	=> 'Muy cómodo el casco y a un muy buen precio teniendo en cuenta que tiene mips. Lo único que tengo para criticar es que para mi gusto es un poquito chico (es decir me hubiera gustado sentir mayor protección en la nuca). De todas maneras muy recomendable.',
            'article_uuid' => 'afc918e8-fe8d-42ce-a145-fba5d4cfbebb'
        ]);

        /* Comments about Bicicleta Venzo Primal */
        factory(App\Comment::class)->create([
            'uuid'  => '66b1856b-80b7-4d9c-9d6f-921f58371b1d',
            'data' 	=> 'La bici es hermosa. Tal cual a la foto!!!!.',
            'article_uuid' => '808116ca-2e70-466f-8580-e07e4e7d1174'
        ]);

        factory(App\Comment::class)->create([
            'uuid'  => 'e4252223-f22a-47b1-ac59-55f47db8e54c',
            'data' 	=> 'La bici en sí es hermosa, el equipamiento mediocre. Es aconsejable pagar un poco más y comprarla con acera y disco hidráulico.',
            'article_uuid' => '808116ca-2e70-466f-8580-e07e4e7d1174'
        ]);

        factory(App\Comment::class)->create([
            'uuid'  => '7ea1416a-9b66-483e-983b-98e31ddbb80b',
            'data' 	=> 'No soy conocedor del rubro, pero la bici se siente sólida al andar. Vino bien armada, no le faltó ningún tornillo ni nada. Trajo dos llaves alem para ajustar. La saqué de la caja y salí andando.',
            'article_uuid' => '808116ca-2e70-466f-8580-e07e4e7d1174'
        ]);

        /* Comments about Bicicleta Mountain bike Raleigh Mojave 2.0 */
        factory(App\Comment::class)->create([
            'uuid'  => 'f4218a38-13c0-4cb8-9010-84592d626d36',
            'data' 	=> 'La bicicleta es un fierro. Los cambios shimano altus pasan rapidísimo, la suspención regulable hace que no sientas ni un pozo y te permite ir mas rápido. Todos los componentes son muy buenos y de marca. La uso todos los días, para ir al trabajo ida y vuelta, en total son 19 kilometros y me resulta muy comoda. Los unicos defectos que le veo son los pedales, los cuales son muy chicos y los mangos del manubrio son medio de mala calidad, pero esas son cosas que se cambian facil. Frena re bien. Estoy conforme, sobretodo con las 18 cuotas.',
            'article_uuid' => '8749d65f-14c9-4665-8243-9530af4ceb19'
        ]);

        factory(App\Comment::class)->create([
            'uuid'  => '2c207505-a530-4df2-828b-c502a1665cd3',
            'data' 	=> 'Muy buena la relación precio calidad. Excelente los cambios y frenos. Es una bicicleta muy adaptable para el uso de una mujer.',
            'article_uuid' => '8749d65f-14c9-4665-8243-9530af4ceb19'
        ]);

        factory(App\Comment::class)->create([
            'uuid'  => 'b33eae85-8490-4b27-a3c5-e832f9d2605f',
            'data' 	=> 'Excelente bicicleta. Se siente robusta, estable y resistente en el andar en caminos y senderos con cierta dificultad técnica. Practico mtb y esta bestia se la banca bien. La recomiendo.',
            'article_uuid' => '8749d65f-14c9-4665-8243-9530af4ceb19'
        ]);

        factory(App\Comment::class, 20)->create();
    }
}
