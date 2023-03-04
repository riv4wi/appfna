<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Article::class)->create([
            'uuid'      => '808116ca-2e70-466f-8580-e07e4e7d1174',
            'title' 	=> 'Bicicleta Venzo Primal XC 2020 R29 24v frenos de disco hidráulico cambios Shimano color azul/negro',
            'content'   => 'La marca Venzo está comprometida a satisfacer las necesidades de cada uno de sus clientes. Para ciclistas de competición, cicloturistas, amateurs o simplemente para quienes utilizan la bici como medio de transporte o de recreación, Venzo busca cumplir sus sueños y brindarles el mejor producto. Diseñada para vos Su sistema de suspensión delantera la hace más liviana que aquellas que tienen doble suspensión. Esto se traduce en más velocidad, mejor nivel y mantenimiento sencillo. Seguridad y calidad Gracias a sus frenos de disco hidráulico podés detener la bicicleta con total precisión cuando lo necesites, ya que tiene una gran potencia; además, su funcionamiento no se ve afectado por cuestiones como la corrosión, las condiciones climáticas o del suelo, ni el estado del aro.',
            'user_uuid' => 'cb9229d1-c0ba-4d9b-9c7f-7f5bcac2f55c'
        ]);

        factory(App\Article::class)->create([
            'uuid'      => '8749d65f-14c9-4665-8243-9530af4ceb19',
            'title' 	=> 'Mountain bike Raleigh Mojave 2.0 2021 R29 15" 21v frenos de disco mecánico cambios Shimano color negro/rojo',
            'content'   => 'Desafiá tus capacidades Las mountain bikes, o bicicletas de montaña son el medio de transporte perfecto para tus aventuras y alcanzar aquellos lugares recónditos que querés conocer. Sus materiales y diseños están pensados para la acción, son resistentes y cuentan con mejor maniobrabilidad que otros modelos brindándote mayor tracción. Además, sus llantas con dibujos marcados favorecen el agarre en terrenos difíciles. Diseñada para vos Su sistema de suspensión delantera la hace más liviana que aquellas que tienen doble suspensión. Esto se traduce en más velocidad, mejor nivel y mantenimiento sencillo. Seguridad y calidad Gracias a sus frenos de disco mecánico podés detener la bicicleta con total precisión. Se caracteriza por su durabilidad, ya que su funcionamiento no se ve afectado por cuestiones como la corrosión, las condiciones climáticas o del suelo.',
            'user_uuid' => 'cb9229d1-c0ba-4d9b-9c7f-7f5bcac2f55c'
        ]);

        factory(App\Article::class)->create([
            'uuid'      => 'afc918e8-fe8d-42ce-a145-fba5d4cfbebb',
            'title' 	=> 'Casco Mtb Ruta Giant Compel Mips Compacto Fresco Regulable',
            'content'   => 'Con un diseño completamente nuevo y un ajuste mejorado, sumada a la protección MIPS, este casco brinda a los ciclistas de todas las edades una experienca más que satisfactoria. • Diseño optimizado con protección cerebral MIPS • El acolchado antimicrobiano TransTextura Plus ™ ayuda a combatir el crecimiento de bacterias al extraer el sudor de la cabeza del ciclista y transferirlo a través de los puertos de escape AirFlow • Construcción ajustada a impactos de baja y alta velocidad con EPS optimizado de baja densidad y una carcasa de policarbonato endurecido ultrafino • El nuevo sistema de ajuste Cinch ONE ™ ofrece una cobertura óptima al sujetar el hueso occipital para una protección, soporte y comodidad óptimas • Visera extraíble • Peso: 335g • Medidas: S/M (49-57cm);M/L (53-61cm);XL (55-63cm',
            'user_uuid' => 'e018658c-11bb-47cb-9011-e1374eeac731'
        ]);
    }
}
