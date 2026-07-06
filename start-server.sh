#!/bin/bash
# Avvia il sito Fabbrica Lirica in locale con il server integrato di PHP.
# Uso: ./start-server.sh [porta]
# Richiede PHP installato (php -v per verificare).

PORT="${1:-8000}"
DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"

echo "Fabbrica Lirica — avvio server di sviluppo"
echo "Cartella: $DIR"
echo "URL:      http://localhost:$PORT"
echo "(Ctrl+C per fermare)"
echo ""

php -S "localhost:$PORT" -t "$DIR"
