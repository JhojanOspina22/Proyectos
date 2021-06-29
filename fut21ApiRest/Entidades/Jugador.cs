using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.Text;
using System.Threading.Tasks;

namespace Entidades
{
    [DataContract]
    public class Jugador
    {
        [DataMember]
        public int id { get; set; }
        [DataMember]
        public string firstName { get; set; }
        [DataMember]
        public string lastName { get; set; }
        [DataMember]
        public string position { get; set; }
        [DataMember]
        public string nacionality { get; set; }
        [DataMember]
        public string club { get; set; }
    }
}
