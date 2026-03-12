# Utiliza a versão Alpine para reduzir o tamanho da imagem e aumentar a segurança
FROM nginx:alpine

# Remove a configuração padrão e copia a nossa
RUN rm /etc/nginx/conf.d/default.conf
COPY nginx.conf /etc/nginx/nginx.conf