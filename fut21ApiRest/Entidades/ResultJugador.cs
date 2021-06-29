using System;
using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Text;
using System.Threading.Tasks;

namespace Entidades
{   
    [DataContract]
    public class ResultJugador
    {   
        [DataMember]
        public int page { get; set; }
        [DataMember]
        public int totalpages { get; set; }
        [DataMember]
        public int items { get; set; }
        [DataMember]
        public int totalItems { get; set; }
        [DataMember]
        public List<Jugador> Lista { get; set; }
        [DataMember]
        public string error{ get; set; }
        public Boolean IsSearch { get; set; }
        public string texto { get; set; }
    }
}
