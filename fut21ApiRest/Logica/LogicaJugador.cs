using Modelo;
using Entidades;
using Repository;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Logica
{
    public class LogicaJugador
    {
        private jugadorRepository repositorio = new jugadorRepository();

        public ResultJugador BuscarJugadores(string texto, int page, string order)
        {
            try
            {
                return repositorio.BuscarJugadores(texto,page, order);
            }
            catch (Exception ex)
            {
                return null;
            }
        }

        public ResultJugador BuscarPorEquipo(string texto, int page)
        {
            try
            {
                return repositorio.BuscarPorEquipo(texto, page);
            }
            catch (Exception ex)
            {
                return null;
            }
        }
    }
}
