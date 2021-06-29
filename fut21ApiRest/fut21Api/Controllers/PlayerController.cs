using Entidades;
using Logica;
using Modelo;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace fut21Api.Controllers
{
    public class PlayerController : ApiController
    {
        private LogicaJugador logicajugador = new LogicaJugador();
        [HttpPost]
        [Route("api/v1/team")]
        public ResultJugador BuscarPorEquipo(string nombreTeam,int page)
        {
            return logicajugador.BuscarPorEquipo(nombreTeam, page);
        }

        [Route("api/v1/player")]
        public ResultJugador GetBuscarJugador(string nombreJugador, int page,string order)
        {
            return logicajugador.BuscarJugadores(nombreJugador, page,order);
        }


    }
}
