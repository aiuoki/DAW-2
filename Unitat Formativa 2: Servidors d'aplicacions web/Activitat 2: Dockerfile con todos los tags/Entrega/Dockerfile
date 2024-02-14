FROM httpd:2.4
ENV APACHE_LOG_DIR /usr/local/apache2/logs/
RUN chown -R www-data:www-data /usr/local/apache2/logs/
COPY index.html /usr/local/apache2/htdocs/
USER www-data
EXPOSE 80
LABEL version="1.0" description="Actividad Tags"
CMD ["httpd-foreground"]