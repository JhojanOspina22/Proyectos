using Entidades;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Threading.Tasks;
using System.Web;
using System.Web.Configuration;
using System.Web.Mvc;

namespace Fut21.Controllers
{
    public class HomeController : Controller
    {
        public async Task<ActionResult> Index(int page=1)
        {
            try
            {
                var urlApi = WebConfigurationManager.AppSettings["UrlApi"];

                var result = await new HttpClient().GetStringAsync(urlApi + $"api/v1/player?nombreJugador=&page={page}&order=asc");

                ResultJugador resultado = JsonConvert.DeserializeObject<ResultJugador>(result);
                resultado.IsSearch = false;
                return View(resultado);


            }
            catch (Exception ex)
            {
                return View(ex.Message);
            }

        }
   
        public ActionResult EliminateFiltro()
        {
            return RedirectToAction("Index" );

        }


        [HttpPost]
        public async Task<ActionResult> Index(string nombreTeam, int page=1)
        {
            try
            {
                if (!String.IsNullOrEmpty(nombreTeam)){

                    using (var client = new HttpClient())
                    {
                        var urlApi = WebConfigurationManager.AppSettings["UrlApi"];
                        client.BaseAddress = new Uri(urlApi + $"api/v1/team?nombreTeam={nombreTeam}&page={page}");

                        //HTTP PUT
                        var postTask = await client.PostAsync("", null);

                        if (postTask.IsSuccessStatusCode)
                        {
                            var json = await postTask.Content.ReadAsStringAsync();
                            ResultJugador result = JsonConvert.DeserializeObject<ResultJugador>(json);
                            result.IsSearch = true;
                            result.texto = nombreTeam;
                            return View(result);
                        }

                    }
                    
                    }
                return RedirectToAction("Index");
            }
            catch (Exception ex)
            {
                return View();
            }

        }

    }
}