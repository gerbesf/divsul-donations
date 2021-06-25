@extends('frontend.layout.app')
@section('main')





    <section style="min-height: 100vh">
        <div class=" ">
            <div class="pcoded-content container">

                <div class="row no-gutters justify-content-center  ">
                    <div class=" col-md-11 col-xl-8 ">
                        <div class="shadow-sm rounded bg-white ">

                            <div class="accordion " id="accordionExample">
                                <div class="border-bottom py-3 ">
                                    <div id="headingOne">
                                        <h5 class="mb-0"><a href="#!" class="acc- px-4" data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne"> Informação Importante <i class="feather icon-chevron-up mr-3 acc-icon"></i></a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse mt-2 show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                       <div class="p-5">
                                           <p>
                                               A Divisão Sulamericana - DIVSUL, é uma entidade sem fins lucrativos cujo objetivo é fornecer servidores de PR:BF2 para todos os jogadores da América do Sul, além de toda a estrutura web necessária ao suporte dos servidores.
                                           </p>
                                           <p>
                                               Para manter os servidores e a estrutura de apoio online, a DIVSUL contrata serviços de hospedagem e proteção Anti DDoS de empresas terceirizadas sob um custo monetário mensal. Dessa forma, contamos com o apoio dos jogadores para continuar com o servidor ativo e fornecendo um serviço de qualidade para o público latino americano.
                                           </p>
                                       </div>
                                    </div>
                                </div>
                                @foreach($methods as $method)
                                <div class="border-bottom py-3">
                                    <div id="headingTwo">
                                        <h5 class="mb-0">
                                            <a href="#!" class=" font-weight-lighter  px-4 collapsed" data-toggle="collapse" data-target="#collapse{{ $method->id }}"
                                               aria-expanded="false" aria-controls="collapseTwo">{{ $method->name }} <i class="feather icon-chevron-up acc-icon mr-3"></i></a></h5>
                                    </div>
                                    <div id="collapse{{ $method->id }}" class="collapse mt-2" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="">
                                            <div class="p-5">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-2 col-md-2 border-right text-center d-none d-md-inline-block">
                                                    <div>
                                                        <img src="{{ $method->logo }}" style="width: auto; width: 100%; height: auto;  opacity: 0.7">
                                                    </div>
                                                </div>
                                                <div class="col-xl-9 col-md-10">
                                                    <div class="py-3">
                                                        <div class="d-md-none">
                                                            <img src="{{ $method->logo }}" style="width: auto; width: 100%; height: auto;  opacity: 0.7" class="pb-5">
                                                        </div>
                                                        <h4 class="font-weight-light">{{ $method->name }}</h4>
                                                        <div class="pb-4">
                                                            {!! nl2br($method->content ) !!}
                                                        </div>
                                                    </div>

                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>





@endsection
