using Entidades;
using System;
using Modelo;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Repository
{
    public class jugadorRepository
    {
        public List<Jugador> GetJugadores()
        {
            using (var ctx = new fut21Entities1())
            {
                return ctx.jugador.Select(u => new Jugador { 
                    id=u.id,
                    firstName=u.firstName,
                    lastName=u.lastName,
                    position=u.position,
                    nacionality=u.nacionality,
                    club=u.club
                }).ToList();
            }
        }

        public ResultJugador BuscarJugadores(string texto, int page , string order)
        {
            using (var ctx = new fut21Entities1())
            {   
                var query = ctx.jugador.Select(u => new Jugador
                {
                    id = u.id,
                    firstName = u.firstName,
                    lastName = u.lastName,
                    position = u.position,
                    nacionality = u.nacionality,
                    club = u.club
                
                
                });

                if (texto != null) query = query.Where(u => u.firstName.ToLower().Contains(texto.ToLower()) || u.lastName.ToLower().Contains(texto.ToLower()));
             
                if (order.ToLower().Equals("asc")) {
                    query = query.OrderBy(u => u.firstName);
                }
                else {
                    query = query.OrderByDescending(u => u.firstName);

                }
                var totalitems = query.Count();
               query= query.Skip(10*(page-1)).Take(10);

                var totalPages = 0;
                var pagesrest = totalitems;
                while (pagesrest > 0)
                {
                    pagesrest -= 10;
                    totalPages++;
                }

                var lista=query.ToList();
                var Error = "";
                if (totalitems == 0) {
                    Error = "No se encontro ninguna coincidencia";
                }
                return new ResultJugador
                {
                    page = page,
                    totalpages = totalPages,
                    totalItems = totalitems,
                    items = lista.Count(),
                    Lista = lista,
                    error = Error
                };
            }
        }

        public ResultJugador BuscarPorEquipo(string texto, int page)
        {
            using (var ctx = new fut21Entities1())
            {
                var query = ctx.jugador.Where(u => u.club.ToLower().Equals(texto.ToLower()))
                    .Select(u => new Jugador {
                    id = u.id,
                    firstName = u.firstName,
                    lastName = u.lastName,
                    position = u.position,
                    nacionality = u.nacionality,
                    club = u.club
                });

                query= query.OrderBy(u => u.firstName);
                var totalitems = query.Count();
                query = query.Skip(10 * (page - 1)).Take(10);

                var totalPages = 0;
                var pagesrest = totalitems;
                while (pagesrest > 0)
                {
                    pagesrest -= 10;
                    totalPages++;
                }

                var lista = query.ToList();
                var Error = "";
                if (totalitems == 0)
                {
                    Error = "No se encontro ninguna coincidencia";
                }
                return new ResultJugador
                {
                    page = page,
                    totalpages = totalPages,
                    totalItems = totalitems,
                    items = lista.Count(),
                    Lista = lista,
                    error = Error
                };
            }
        }



    }
}
