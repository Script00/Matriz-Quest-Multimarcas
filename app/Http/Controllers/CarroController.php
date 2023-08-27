<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use DOMDocument;
use App\Carro;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::where('user_id', Auth::user()->id)->get();
        return view('lista_carros', compact('carros'));
    }

    public function destroy(Request $request)
    {
        //dd($request->id_carro);
        $carro = Carro::find($request->id_carro);
        if(empty($carro)){
            session()->flash('nao_apagou', 'Ops um erro inesperado aconteceu. Entre em contato!');
            return redirect()->route('lista_carros');
        }else{
            $carro->delete();
            session()->flash('apagou', 'Veículo apagado com sucesso.');
            return redirect()->route('lista_carros');
        }    
    }

    public function encontrar_carros(Request $request)
    {
        $dados = $request->all();
        $matches = array();
        $matchesImgs = array();
        $matchesTituloLink = array();
        $matchesListDados = array();
        $matchesPrecos = array();
        $dadosCarros = array();

        if(isset($dados['marca'])){
            $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.questmultimarcas.com.br/estoque?termo='.$dados['marca']);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $html = curl_exec($ch);
            curl_close($ch);

            $doc = new DOMDocument();
            @$doc->loadHTML($html);
            $carInfo = [];
            $carDivs = $doc->getElementsByTagName('div');
            foreach ($carDivs as $carDiv) {
                if($carDiv->getAttribute('class') === 'card card-car'){
                    $car = [];
                    // Recuperar a imagem e o título do veículo
                    $carImage = $carDiv->getElementsByTagName('img')->item(0);
                    $car['imagem'] = $carImage->getAttribute('data-src');
                    $car['titulo'] = $carImage->getAttribute('alt');
                    // Recuperar a marca e o modelo
                    $carDescription = $carDiv->getElementsByTagName('h3')->item(0);
                    $carNameParts = explode(' ', $carDescription->textContent);
                    $car['marca'] = $carNameParts[0];
                    $car['modelo'] = implode(' ', array_slice($carNameParts, 1));
                    // Recuperar o preço
                    $price = $carDiv->getElementsByTagName('strong');
                    if($price->length > 0){
                        $car['preco'] = $price->item(0)->textContent;
                    }
                    // Recuperar informações de ano e quilometragem
                    $carDetailInfo = $carDiv->getElementsByTagName('div')->item(8);
                    $carDetailSpans = $carDetailInfo->getElementsByTagName('span');
                    if($carDetailSpans->length > 0){
                        $car['ano'] = $carDetailSpans->item(0)->textContent;
                        $car['quilometragem'] = $carDetailSpans->item(1)->textContent;
                    }
                    // Recuperar o link "Ver mais"
                    $verMaisLink = $carDiv->getElementsByTagName('a')->item(1);
                    $car['ver_mais_link'] = $verMaisLink->getAttribute('href');
                    $carInfo[] = $car;
                }
            }
            //dd($carInfo);
            foreach($carInfo as $carro){
                $carro = Carro::create([
                    'user_id' => Auth::user()->id,
                    'link' => $carro['imagem'],
                    'nome_veiculo' => $carro['marca'].','.$carro['modelo'].','.$carro['titulo'],
                    'quilometragem' => $carro['quilometragem'],
                    'preco' => $carro['preco'],
                    'ano' => $carro['ano'],
                    'ano' => $carro['ano'],
                    'ver_mais_link' => $carro['ver_mais_link'],
                ]);
            }
        }
        if(empty($carInfo)){
            session()->flash('error', 'A consulta falhou.');
            return redirect()->route('lista_carros');
        }else{
            session()->flash('sucesso', 'A consulta foi processada com sucesso.');
            return redirect()->route('lista_carros');
        }
    }
}