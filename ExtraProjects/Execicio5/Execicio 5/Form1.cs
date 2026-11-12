using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Execicio_5
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        public class NumeroImparException : Exception
        {
            public NumeroImparException()
                : base("Só são permitidos números pares.") { }
        }

        public class ForaDoIntervaloException : Exception
        {
            public ForaDoIntervaloException()
                : base("O valor deve estar entre 10 e 20.") { }
        }

        public class MesInvalidoException : Exception
        {
            public MesInvalidoException()
                : base("Mês inválido.") { }
        }

        public class DivisaoPorZeroPersonalizadaException : Exception
        {
            public DivisaoPorZeroPersonalizadaException()
                : base("Não podes dividir por zero.") { }
        }

        // Mês
        private void button3_Click_1(object sender, EventArgs e)
        {
            try
            {
                int mes = Convert.ToInt32(textBox9.Text);

                switch (mes)
                {
                    case 1: MessageBox.Show("Janeiro"); break;
                    case 2: MessageBox.Show("Fevereiro"); break;
                    case 3: MessageBox.Show("Março"); break;
                    case 4: MessageBox.Show("Abril"); break;
                    case 5: MessageBox.Show("Maio"); break;
                    case 6: MessageBox.Show("Junho"); break;
                    case 7: MessageBox.Show("Julho"); break;
                    case 8: MessageBox.Show("Agosto"); break;
                    case 9: MessageBox.Show("Setembro"); break;
                    case 10: MessageBox.Show("Outubro"); break;
                    case 11: MessageBox.Show("Novembro"); break;
                    case 12: MessageBox.Show("Dezembro"); break;
                    default: throw new MesInvalidoException();
                }
            }
            catch (FormatException)
            {
                MessageBox.Show("Introduce apenas números.");
            }
            catch (MesInvalidoException ex)
            {
                MessageBox.Show("Atenção: " + ex.Message);
            }
        }

        private string nomeMes(int num_mes)
        {
            switch (num_mes)
            {
                case 1: return "Janeiro";
                case 2: return "Fevereiro";
                case 3: return "Março";
                case 4: return "Abril";
                case 5: return "Maio";
                case 6: return "Junho";
                case 7: return "Julho";
                case 8: return "Agosto";
                case 9: return "Setembro";
                case 10: return "Outubro";
                case 11: return "Novembro";
                case 12: return "Dezembro";
                default: throw new ArgumentOutOfRangeException("", "Mês inválido.");
            }
        }

        private void button4_Click_1(object sender, EventArgs e)
        {
            try
            {
                int mes = Convert.ToInt32(textBox11.Text);
                MessageBox.Show("O mês digitado é: " + nomeMes(mes));
            }
            catch (ArgumentOutOfRangeException md)
            {
                MessageBox.Show("Atenção: " + md.Message);
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        // Valor dentro do intervalo
        private void button1_Click_1(object sender, EventArgs e)
        {
            try
            {
                int numero = Convert.ToInt32(textBox6.Text);

                if (numero < 10 || numero > 20)
                    throw new ForaDoIntervaloException();

                MessageBox.Show("Valor dentro do intervalo.");
            }
            catch (FormatException)
            {
                MessageBox.Show("Introduce apenas números.");
            }
            catch (ForaDoIntervaloException ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void button5_Click_1(object sender, EventArgs e)
        {
            try
            {
                int a = Convert.ToInt32(textBox8.Text);
                int b = Convert.ToInt32(textBox7.Text);

                if (b == 0)
                    throw new DivisaoPorZeroPersonalizadaException();

                int resultado = a / b;

                MessageBox.Show("Resultado: " + resultado);
            }
            catch (FormatException)
            {
                MessageBox.Show("Introduce apenas números.");
            }
            catch (DivisaoPorZeroPersonalizadaException ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            try
            {
                int numero = Convert.ToInt32(textBox1.Text);

                if (numero % 2 != 0)
                    throw new NumeroImparException();

                MessageBox.Show("Número válido!");
            }
            catch (FormatException)
            {
                MessageBox.Show("Introduce apenas números.");
            }
            catch (NumeroImparException ex)
            {
                MessageBox.Show(ex.Message);
            }
        }
    }
}
